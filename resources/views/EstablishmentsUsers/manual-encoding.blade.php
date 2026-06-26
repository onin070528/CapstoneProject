@extends('EstablishmentsUsers.layout', ['activePage' => 'manual-encoding'])

@section('title', 'Blue Bless Resort - Manual Encoding')

@section('establishment-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Manual Encoding</h1>
        <p class="text-sm text-slate-500 mt-1">Register visitors manually if they do not have a smart QR code or phone.</p>
    </div>

    <!-- Encoding Form Card -->
    <div class="max-w-3xl bg-white rounded-xl border border-slate-100 shadow-sm p-6">
        <form class="space-y-6" onsubmit="event.preventDefault(); alert('Visitor registered successfully!');">
            <h3 class="font-bold text-slate-800 text-base border-b border-slate-50 pb-3">New Registration Form</h3>

            <!-- Grid 1: Full Name & Nationality -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="visitor_name" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Full Name *</label>
                    <input type="text" id="visitor_name" required placeholder="Enter visitor's full name" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
                <div class="space-y-2">
                    <label for="nationality" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Country/Origin *</label>
                    <input type="text" id="nationality" required placeholder="e.g. Japan, Manila, USA" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
            </div>

            <!-- Grid 2: Purpose & Contact -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="purpose" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Purpose of Visit</label>
                    <select id="purpose" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                        <option value="leisure" selected>Leisure / Vacation</option>
                        <option value="business">Business / Work</option>
                        <option value="transit">Transit / Stopover</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="stay_duration" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Intended Stay (Days)</label>
                    <input type="number" id="stay_duration" min="1" placeholder="e.g. 3" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
            </div>

            <!-- Contact Information Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="contact_phone" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Mobile Number</label>
                    <input type="tel" id="contact_phone" placeholder="e.g. +63 900 000 0000" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
                <div class="space-y-2">
                    <label for="contact_email" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Email Address</label>
                    <input type="email" id="contact_email" placeholder="e.g. guest@example.com" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4 pt-2 border-t border-slate-50">
                <button type="submit" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-5 py-2.5 rounded-[6px] font-semibold text-sm transition shadow-sm">
                    Submit Registration
                </button>
                <button type="reset" class="border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-5 py-2.5 text-sm font-semibold rounded-[6px] transition">
                    Clear Form
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
