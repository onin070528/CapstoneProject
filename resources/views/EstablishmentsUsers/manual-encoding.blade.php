@extends('EstablishmentsUsers.layout', ['activePage' => 'manual-encoding'])

@section('title', 'Blue Bless Resort - Manual Encoding')

@section('establishment-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manual Encoding</h1>
            <p class="text-sm text-slate-500 mt-1">Register visitors manually if they do not have a smart QR code or phone.</p>
        </div>
        <div class="flex items-center gap-3 text-xs text-slate-400 font-semibold">
            <span id="entry-counter">1 entry</span>
        </div>
    </div>

    <!-- Forms Container -->
    <div id="forms-container" class="space-y-4 max-w-3xl">
        <!-- First form is rendered statically -->
    </div>

    <!-- Add Another Visitor Button -->
    <div class="max-w-3xl">
        <button type="button" onclick="addEntryForm()"
            class="w-full flex items-center justify-center gap-2 border-2 border-dashed border-slate-200 hover:border-[#0a4e5c] text-slate-400 hover:text-[#0a4e5c] rounded-xl py-4 text-sm font-bold transition-all duration-200 group">
            <span class="w-7 h-7 rounded-full bg-slate-100 group-hover:bg-[#0a4e5c]/10 flex items-center justify-center transition-colors">
                <i class="fas fa-plus text-[11px]"></i>
            </span>
            Add Another Visitor
        </button>
    </div>

    <!-- Submit All Button -->
    <div class="max-w-3xl pt-2">
        <div class="flex items-center gap-4">
            <button type="button" onclick="submitAllForms()"
                class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-6 py-2.5 rounded-[6px] font-semibold text-sm transition shadow-sm flex items-center gap-2">
                <i class="fas fa-paper-plane text-xs"></i>
                Submit All Registrations
            </button>
            <button type="button" onclick="clearAllForms()"
                class="border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-5 py-2.5 text-sm font-semibold rounded-[6px] transition">
                Clear All
            </button>
        </div>
    </div>
</div>

<script>
    let entryCount = 0;
    const today = new Date().toISOString().split('T')[0];

    function buildFormCard(index) {
        const entryNo = String(index).padStart(3, '0');
        const uniqueId = `entry_${index}`;

        return `
        <div id="card_${index}" class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 transition-all duration-300" style="animation: slideDown 0.25s ease forwards;">
            <div class="flex items-center justify-between mb-5">
                <div class="flex items-center gap-2">
                    <span class="bg-[#0a4e5c]/10 text-[#0a4e5c] text-[10px] font-extrabold px-2.5 py-1 rounded-full tracking-wider uppercase">Entry #${entryNo}</span>
                </div>
                ${index > 1 ? `
                <button type="button" onclick="removeForm(${index})"
                    class="w-7 h-7 flex items-center justify-center rounded-full border border-slate-200 text-slate-400 hover:border-rose-300 hover:text-rose-500 hover:bg-rose-50 transition-all" title="Remove this entry">
                    <i class="fas fa-times text-[10px]"></i>
                </button>` : '<div></div>'}
            </div>

            <!-- Grid 1: Entry No. & Date -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Entry No.</label>
                    <input type="text" value="${entryNo}" readonly
                        class="w-full bg-slate-100 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-400 font-semibold focus:outline-none cursor-not-allowed">
                </div>
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Date</label>
                    <input type="date" id="${uniqueId}_date" required value="${today}"
                        class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
            </div>

            <!-- Grid 2: Name & Gender -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Name of Visitor *</label>
                    <input type="text" id="${uniqueId}_name" required placeholder="Enter visitor's full name"
                        class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Gender *</label>
                    <select id="${uniqueId}_gender" required
                        class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                        <option value="" disabled selected>Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <!-- Place of Residence -->
            <div class="space-y-1.5 mb-4">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Place of Residence *</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 border border-slate-200 hover:border-[#0a4e5c] px-4 py-2.5 rounded-[6px] cursor-pointer transition flex-1">
                        <input type="radio" name="${uniqueId}_residence" value="philippines" class="w-4 h-4 text-[#0a4e5c]"
                            onchange="updateRemarksPlaceholder('${uniqueId}', this.value)">
                        <span class="text-sm font-semibold text-slate-700">Philippines</span>
                    </label>
                    <label class="flex items-center gap-2 border border-slate-200 hover:border-[#0a4e5c] px-4 py-2.5 rounded-[6px] cursor-pointer transition flex-1">
                        <input type="radio" name="${uniqueId}_residence" value="foreign" class="w-4 h-4 text-[#0a4e5c]"
                            onchange="updateRemarksPlaceholder('${uniqueId}', this.value)">
                        <span class="text-sm font-semibold text-slate-700">Foreign</span>
                    </label>
                </div>
            </div>

            <!-- Remarks -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">
                    Remarks <span class="text-slate-400 normal-case font-normal">(Specific municipality &amp; province, or country of residence)</span>
                </label>
                <input type="text" id="${uniqueId}_remarks" required
                    placeholder="e.g. Davao City, Davao del Sur  OR  Tokyo, Japan"
                    class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
            </div>
        </div>`;
    }

    function addEntryForm() {
        entryCount++;
        const container = document.getElementById('forms-container');
        const div = document.createElement('div');
        div.innerHTML = buildFormCard(entryCount);
        container.appendChild(div.firstElementChild);
        updateEntryCounter();

        // Smooth scroll to the new form
        setTimeout(() => {
            document.getElementById(`card_${entryCount}`).scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 50);
    }

    function removeForm(index) {
        const card = document.getElementById(`card_${index}`);
        if (card) {
            card.style.opacity = '0';
            card.style.transform = 'translateY(-8px)';
            card.style.transition = 'opacity 0.2s, transform 0.2s';
            setTimeout(() => {
                card.remove();
                updateEntryCounter();
            }, 200);
        }
    }

    function updateEntryCounter() {
        const cards = document.querySelectorAll('#forms-container > div[id^="card_"]');
        const count = cards.length;
        document.getElementById('entry-counter').textContent = count === 1 ? '1 entry' : `${count} entries`;
    }

    function updateRemarksPlaceholder(uniqueId, type) {
        const input = document.getElementById(`${uniqueId}_remarks`);
        if (!input) return;
        input.placeholder = type === 'philippines'
            ? 'e.g. Davao City, Davao del Sur'
            : 'e.g. Tokyo, Japan';
    }

    function submitAllForms() {
        const cards = document.querySelectorAll('#forms-container > div[id^="card_"]');
        let allValid = true;
        cards.forEach(card => {
            const inputs = card.querySelectorAll('input[required], select[required]');
            inputs.forEach(input => {
                if (!input.value) {
                    allValid = false;
                    input.classList.add('border-rose-300', 'ring-1', 'ring-rose-200');
                } else {
                    input.classList.remove('border-rose-300', 'ring-1', 'ring-rose-200');
                }
            });
            // Validate radio
            const radioName = card.querySelector('input[type="radio"]')?.name;
            if (radioName && !card.querySelector(`input[name="${radioName}"]:checked`)) {
                allValid = false;
            }
        });

        if (!allValid) {
            alert('Please complete all required fields before submitting.');
            return;
        }

        alert(`✅ ${cards.length} visitor registration(s) submitted successfully!`);
    }

    function clearAllForms() {
        if (!confirm('Clear all entries and start over?')) return;
        const container = document.getElementById('forms-container');
        container.innerHTML = '';
        entryCount = 0;
        addEntryForm();
    }

    // Initialize with first form on load
    document.addEventListener('DOMContentLoaded', function () {
        addEntryForm();
    });
</script>

<style>
    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
