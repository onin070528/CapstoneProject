<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    /**
     * Handle incoming chatbot queries.
     */
    public function query(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = trim($request->input('message'));
        $apiKey = env('GEMINI_API_KEY');

        // If Gemini API Key is set, try to use generative AI
        if (!empty($apiKey)) {
            try {
                $response = $this->callGemini($message, $apiKey);
                if ($response) {
                    return response()->json([
                        'status' => 'success',
                        'reply' => $response,
                        'source' => 'gemini'
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Chatbot Gemini API error: ' . $e->getMessage());
                // Fall through to local filter/response engine on failure
            }
        }

        // Fallback to local filter & response engine
        $reply = $this->localResponseEngine($message);
        return response()->json([
            'status' => 'success',
            'reply' => $reply,
            'source' => 'local_filter'
        ]);
    }

    /**
     * Call the Gemini API with strict system guidelines.
     */
    protected function callGemini($message, $apiKey)
    {
        $systemPrompt = "You are the official AI Chatbot for the iTOUR Davao Oriental Tourism Intelligence System. " .
            "Your job is to answer questions about the system (e.g. registration, login, dashboards, tourist monitoring, experience analytics, QR code scanning, role management, audit logs, and reports). " .
            "VERY IMPORTANT RULE: You must ONLY answer questions directly related to the iTOUR system and its features. " .
            "If the user's question or message is not related to the system or its features (e.g. general programming, cooking, history, science, math, or generic greetings that turn into unrelated topics), " .
            "you MUST disregard the query and reply exactly with: " .
            "'I am sorry, but I can only answer questions related to the iTOUR Tourism Intelligence System. Let me know if you have questions about system registration, login, tourist scanning, or dashboard features!' " .
            "Keep responses helpful, direct, and concise.";

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

        $payload = [
            'systemInstruction' => [
                'parts' => [
                    ['text' => $systemPrompt]
                ]
            ],
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $message]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => 0.2,
                'maxOutputTokens' => 400,
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                return trim($data['candidates'][0]['content']['parts'][0]['text']);
            }
        }

        throw new \Exception('Failed to retrieve valid response from Gemini API: ' . $response->body());
    }

    /**
     * Local filter and rule-based response engine.
     */
    protected function localResponseEngine($message)
    {
        $lowerMsg = strtolower($message);

        // Define keywords related to the system
        $systemKeywords = [
            'itour', 'system', 'mati', 'tourism', 'establishment', 'register', 'login', 
            'account', 'owner', 'admin', 'qr', 'scan', 'scanner', 'report', 'analytic', 'dashboard', 
            'manual', 'encode', 'feedback', 'password', 'user', 'role', 'tourist', 'data', 
            'security', 'privacy', 'monitoring', 'destination', 'hello', 'hi', 'hey', 'help',
            'how to', 'what is', 'creator', 'developer'
        ];

        // Check if query is related
        $isRelated = false;
        foreach ($systemKeywords as $keyword) {
            if (str_contains($lowerMsg, $keyword)) {
                $isRelated = true;
                break;
            }
        }

        // If not related, disregard/reject
        if (!$isRelated) {
            return "I am sorry, but I can only answer questions related to the iTOUR Tourism Intelligence System. Let me know if you have questions about system registration, login, tourist scanning, or dashboard features!";
        }

        // Simple mock responses for related keywords
        if ($this->hasAny($lowerMsg, ['hello', 'hi', 'hey', 'good morning', 'good afternoon'])) {
            return "Hello! I am the iTOUR AI Assistant. I can answer questions about the iTOUR Tourism Intelligence System (registration, login, QR codes, dashboards, monitoring). How can I assist you with the system today?";
        }

        if ($this->hasAny($lowerMsg, ['register', 'sign up', 'signup'])) {
            return "To register an establishment, click the **Register** button in the top right of the landing page navigation. You'll need to enter details such as the establishment name, category, contact information, and create an owner account. Once registered, the PTO Admin will review your registration, and you will be able to log in to generate your QR code.";
        }

        if ($this->hasAny($lowerMsg, ['login', 'sign in', 'signin', 'log in'])) {
            return "You can log in by clicking the **Login** button at the top right of the landing page. Enter your email and password. If your credentials are correct, you will be redirected to either the PTO Admin Dashboard or the Establishment Owner Dashboard depending on your user role.";
        }

        if ($this->hasAny($lowerMsg, ['qr', 'scan', 'scanner'])) {
            return "iTOUR utilizes QR codes for fast, seamless tourist check-ins. Establishment Owners can generate and download their unique QR code from their dashboard. Tourists can scan this QR code when visiting to log their entry and quickly fill out a feedback/experience rating form.";
        }

        if ($this->hasAny($lowerMsg, ['admin', 'pto'])) {
            return "The Provincial Tourism Office (PTO) Admin dashboard provides comprehensive oversight of Davao Oriental's tourism intelligence. Admins can monitor tourist traffic in real time, view experience analytics (satisfaction rates, feedback summaries), manage destinations/establishments, view system audit logs, and manage user accounts.";
        }

        if ($this->hasAny($lowerMsg, ['dashboard', 'analytic', 'report'])) {
            return "The iTOUR system provides detailed dashboards for different roles. PTO Admins see global metrics such as overall tourist counts, sentiment analytics, and reports. Establishment Owners see metrics specific to their establishment, including daily check-ins, monthly visitor logs, and feedback notifications.";
        }

        if ($this->hasAny($lowerMsg, ['tourist', 'monitor', 'experience'])) {
            return "The system monitors tourist visits to help Davao Oriental optimize its tourism programs. By tracking visitor origin, demographic data, and feedback sentiment, the iTOUR system generates experience analytics to support local tourism planning and development.";
        }

        if ($this->hasAny($lowerMsg, ['creator', 'developer', 'who build', 'who made'])) {
            return "I am the iTOUR AI Assistant. The iTOUR system is developed for the Provincial Tourism Office of Davao Oriental as a Tourism Intelligence platform.";
        }

        // Generic related fallback
        return "I understand you are asking about the iTOUR Tourism Intelligence System. Could you please specify your question? I can guide you on Registration, Login issues, QR code scanning, PTO Admin dashboards, or Establishment visitor monitoring.";
    }

    /**
     * Helper to check if string contains any item in array.
     */
    protected function hasAny($string, array $keywords)
    {
        foreach ($keywords as $keyword) {
            if (str_contains($string, $keyword)) {
                return true;
            }
        }
        return false;
    }
}
