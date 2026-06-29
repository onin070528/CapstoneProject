@extends('EstablishmentsUsers.layout', ['activePage' => 'manual-encoding'])

@section('title', 'Blue Bless Resort - Arrival Recording')

@section('establishment-content')
<div class="space-y-5">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Arrival Recording</h1>
            <p class="text-sm text-slate-500 mt-1">Bulk-encode tourist arrivals with shared group information.</p>
        </div>
        <div class="flex items-center gap-3 text-xs text-slate-400 font-semibold">
            <span id="row-counter">1 visitor</span>
        </div>
    </div>

    <!-- Visit Information -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5">
        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Visit Information</h3>
        <div class="max-w-xs">
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Date of Visit</label>
            <input type="date" id="visit-date" readonly
                class="w-full bg-slate-100 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-500 font-semibold focus:outline-none cursor-not-allowed">
        </div>
    </div>

    <!-- Group Information -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5">
        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Group Information</h3>
        <p class="text-xs text-slate-400 mb-4 -mt-2">Shared details applied to all visitors in this submission.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1.5">Classification <span class="text-rose-400">*</span></label>
                <select id="group-classification" onchange="onGroupClassificationChange()"
                    class="w-full border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-700 bg-white focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                    <option value="" disabled selected>Select classification</option>
                    <option value="r">City/Municipality Resident (R)</option>
                    <option value="pr">Provincial Resident (PR)</option>
                    <option value="nr">Non-Resident (NR)</option>
                    <option value="ft">Foreign Tourist (FT)</option>
                </select>
            </div>
            <div>
                <label id="location-label" class="block text-xs font-semibold text-slate-600 mb-1.5">Municipality / Province / Country <span class="text-rose-400">*</span></label>
                <input type="text" id="group-location" placeholder="Select classification first"
                    class="w-full border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-700 bg-white focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
            </div>
        </div>
    </div>

    <!-- Visitor Information -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Visitor Information</h3>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2">
                    <span class="text-xs text-slate-400 font-medium">Bulk add:</span>
                    <input type="number" id="bulk-count" value="5" min="1" max="100"
                        class="w-16 border border-slate-200 rounded-[4px] px-2 py-1 text-xs text-slate-700 text-center bg-white focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                    <button type="button" onclick="bulkAdd()"
                        class="text-xs font-semibold text-[#0a4e5c] hover:text-[#073640] px-2 py-1 rounded transition">
                        Generate
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="arrival-table w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-slate-400 text-[10px] font-bold tracking-wider uppercase">
                        <th class="py-3 px-3 w-12 text-center">#</th>
                        <th class="py-3 px-3">Visitor Name <span class="font-normal normal-case text-slate-300">(Optional)</span></th>
                        <th class="py-3 px-3 w-44">Gender <span class="text-rose-400">*</span></th>
                        <th class="py-3 px-3 w-10"></th>
                    </tr>
                </thead>
                <tbody id="table-body" class="divide-y divide-slate-50">
                </tbody>
            </table>
        </div>

        <!-- Add Visitor Row -->
        <div class="p-4 border-t border-slate-100 flex items-center gap-3">
            <button type="button" onclick="addVisitor()"
                class="flex items-center gap-2 border-2 border-dashed border-slate-200 hover:border-[#0a4e5c] text-slate-400 hover:text-[#0a4e5c] rounded-lg px-5 py-2.5 text-sm font-bold transition-all duration-200 group">
                <span class="w-6 h-6 rounded-full bg-slate-100 group-hover:bg-[#0a4e5c]/10 flex items-center justify-center transition-colors">
                    <i class="fas fa-plus text-[10px]"></i>
                </span>
                Add Visitor
            </button>
        </div>

        <!-- Action Buttons -->
        <div class="px-5 pb-5 flex items-center gap-4">
            <button type="button" onclick="submitAll()"
                class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-6 py-2.5 rounded-[6px] font-semibold text-sm transition shadow-sm flex items-center gap-2">
                <i class="fas fa-paper-plane text-xs"></i>
                Submit Tourist Arrivals
            </button>
            <button type="button" onclick="clearAll()"
                class="border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-5 py-2.5 text-sm font-semibold rounded-[6px] transition">
                Clear Entries
            </button>
        </div>
    </div>
</div>

<script>
    let rowIdCounter = 0;
    const today = new Date().toISOString().split('T')[0];

    const genderOptions = [
        { value: '', label: 'Select', disabled: true, selected: true },
        { value: 'male', label: 'Male' },
        { value: 'female', label: 'Female' },
        { value: 'unspecified', label: 'Prefer not to say' },
    ];

    const classificationLabels = {
        r: 'Municipality/City',
        pr: 'Province',
        nr: 'Province',
        ft: 'Country',
    };

    const classificationPlaceholders = {
        r: 'Enter Municipality/City',
        pr: 'Enter Province',
        nr: 'Enter Province',
        ft: 'Enter Country',
    };

    function buildRow(id) {
        const genderOpts = genderOptions.map(o =>
            `<option value="${o.value}" ${o.disabled ? 'disabled' : ''} ${o.selected ? 'selected' : ''}>${o.label}</option>`
        ).join('');

        return `
        <tr id="row_${id}" class="hover:bg-slate-50/50 transition">
            <td class="py-2 px-3 text-center">
                <span class="row-number text-xs font-bold text-slate-400"></span>
            </td>
            <td class="py-2 px-3">
                <input type="text" placeholder="Enter name (optional)"
                    class="w-full border border-slate-200 rounded-[4px] px-3 py-1.5 text-sm text-slate-700 bg-white focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
            </td>
            <td class="py-2 px-3">
                <select
                    class="w-full border border-slate-200 rounded-[4px] px-3 py-1.5 text-sm text-slate-700 bg-white focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                    ${genderOpts}
                </select>
            </td>
            <td class="py-2 px-3 text-center">
                <button type="button" onclick="removeVisitor(${id})"
                    class="w-6 h-6 flex items-center justify-center rounded text-slate-300 hover:text-rose-400 hover:bg-rose-50 transition-all" title="Remove visitor">
                    <i class="fas fa-times text-[10px]"></i>
                </button>
            </td>
        </tr>`;
    }

    function addVisitor() {
        rowIdCounter++;
        const tbody = document.getElementById('table-body');
        const temp = document.createElement('div');
        temp.innerHTML = buildRow(rowIdCounter);
        tbody.appendChild(temp.firstElementChild);
        updateRowNumbers();
        updateRowCounter();
        const newRow = document.getElementById(`row_${rowIdCounter}`);
        if (newRow) {
            const nameInput = newRow.querySelector('input');
            setTimeout(() => nameInput?.focus(), 50);
        }
    }

    function removeVisitor(id) {
        const row = document.getElementById(`row_${id}`);
        if (!row) return;
        const rows = document.querySelectorAll('#table-body tr');
        if (rows.length <= 1) return;
        row.style.opacity = '0';
        row.style.transform = 'translateX(-8px)';
        row.style.transition = 'opacity 0.2s, transform 0.2s';
        setTimeout(() => {
            row.remove();
            updateRowNumbers();
            updateRowCounter();
        }, 200);
    }

    function bulkAdd() {
        const countInput = document.getElementById('bulk-count');
        let count = parseInt(countInput.value);
        if (isNaN(count) || count < 1) count = 1;
        if (count > 100) count = 100;
        const tbody = document.getElementById('table-body');
        const fragment = document.createDocumentFragment();
        for (let i = 0; i < count; i++) {
            rowIdCounter++;
            const temp = document.createElement('div');
            temp.innerHTML = buildRow(rowIdCounter);
            fragment.appendChild(temp.firstElementChild);
        }
        tbody.appendChild(fragment);
        updateRowNumbers();
        updateRowCounter();
        const firstNewRow = document.getElementById(`row_${rowIdCounter - count + 1}`);
        if (firstNewRow) {
            setTimeout(() => firstNewRow.querySelector('input')?.focus(), 50);
        }
    }

    function onGroupClassificationChange() {
        const select = document.getElementById('group-classification');
        const locationInput = document.getElementById('group-location');
        const label = document.getElementById('location-label');
        const val = select.value;

        if (val && classificationLabels[val]) {
            label.textContent = classificationLabels[val] + ' *';
            locationInput.placeholder = classificationPlaceholders[val];
            locationInput.disabled = false;
        } else {
            label.textContent = 'Municipality / Province / Country *';
            locationInput.placeholder = 'Select classification first';
            locationInput.value = '';
            locationInput.disabled = true;
        }
    }

    function updateRowNumbers() {
        const rows = document.querySelectorAll('#table-body tr');
        rows.forEach((row, index) => {
            const numSpan = row.querySelector('.row-number');
            if (numSpan) numSpan.textContent = index + 1;
        });
    }

    function updateRowCounter() {
        const rows = document.querySelectorAll('#table-body tr');
        const count = rows.length;
        document.getElementById('row-counter').textContent = count === 1 ? '1 visitor' : `${count} visitors`;
    }

    function submitAll() {
        const classSelect = document.getElementById('group-classification');
        const locationInput = document.getElementById('group-location');

        if (!classSelect.value) {
            classSelect.classList.add('border-rose-300', 'ring-1', 'ring-rose-200');
            classSelect.focus();
            alert('Please select a Classification for the group.');
            return;
        }
        classSelect.classList.remove('border-rose-300', 'ring-1', 'ring-rose-200');

        if (!locationInput.value.trim()) {
            locationInput.classList.add('border-rose-300', 'ring-1', 'ring-rose-200');
            locationInput.focus();
            alert('Please enter the location.');
            return;
        }
        locationInput.classList.remove('border-rose-300', 'ring-1', 'ring-rose-200');

        const rows = document.querySelectorAll('#table-body tr');
        let allValid = true;
        let firstInvalid = null;

        rows.forEach(row => {
            const genderSelect = row.querySelector('select');
            if (!genderSelect.value) {
                allValid = false;
                genderSelect.classList.add('border-rose-300', 'ring-1', 'ring-rose-200');
                if (!firstInvalid) firstInvalid = genderSelect;
            } else {
                genderSelect.classList.remove('border-rose-300', 'ring-1', 'ring-rose-200');
            }
        });

        if (!allValid) {
            alert('Please select a Gender for each visitor before submitting.');
            if (firstInvalid) firstInvalid.focus();
            return;
        }

        alert(`✅ ${rows.length} tourist arrival(s) submitted successfully!`);
    }

    function clearAll() {
        if (!confirm('Clear all entries and start over?')) return;
        document.getElementById('group-classification').value = '';
        document.getElementById('group-location').value = '';
        document.getElementById('location-label').textContent = 'Municipality / Province / Country *';
        document.getElementById('group-location').placeholder = 'Select classification first';
        document.getElementById('group-location').disabled = true;
        document.getElementById('group-classification').classList.remove('border-rose-300', 'ring-1', 'ring-rose-200');
        document.getElementById('group-location').classList.remove('border-rose-300', 'ring-1', 'ring-rose-200');
        const tbody = document.getElementById('table-body');
        tbody.innerHTML = '';
        rowIdCounter = 0;
        addVisitor();
    }

    function init() {
        document.getElementById('visit-date').value = today;
        document.getElementById('group-location').disabled = true;
        addVisitor();
    }

    document.addEventListener('DOMContentLoaded', init);
</script>

<style>
    .arrival-table th {
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .arrival-table input::placeholder,
    .arrival-table select:invalid {
        color: #94a3b8;
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    #table-body tr {
        animation: slideDown 0.2s ease forwards;
    }
</style>
@endsection