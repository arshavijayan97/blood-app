<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Blood Donations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- resources/views/invoice_form.blade.php -->
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Enter The Details') }}
        </h2>

    </header>

    <form id="myForm" method="post" action="{{ route('donation.save') }}" class="mt-6 space-y-6">
        @csrf
 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        
<div>
    <label for="donor_name">Donor Name (Only alpha characters) <span class="required" style="color:red;">*</span></label>
    <input type="text" name="donor_name" id="donor_name" pattern="[A-Za-z\s]+" required class="mt-1 block w-full">
    <span id="donor_name_error" class="error-message"></span>
</div>
<div>
    <label for="blood_group">Blood Group <span class="required" style="color:red;">*</span></label>
    <select id="blood_group" name="blood_group" class="mt-1 block w-full" required>
        <option value="">Select a blood group</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
    </select>
    <span id="blood_groupError" class="error-message"></span>
</div>
<div>
    <label for="donation_date">Date of Donation: <span class="required" style="color:red;">*</span> </label>
    <input type="date" name="donation_date" id="donation_date" class="mt-1 block w-full" required>
    <span id="donation_date_error" class="error-message"></span>
</div>
<div>
    <label for="quantity_ml">Quantity (in ml) <span class="required" style="color:red;">*</span></label>
    <input id="quantity_ml" name="quantity_ml" type="number" class="mt-1 block w-full" autocomplete="off" required>
    <span id="quantityMlError" class="error-message"></span>
    
    <span id="quantity_ml_error" class="error-message"></span>
</div>



        <div class="flex items-center gap-4">
            <x-primary-button style="background:blue;">{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
                </div>
            </div>
        </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 @vite(['resources/js/validation.js'])
    <!-- Script for handling input changes -->

@if(session('success'))
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1200); 
        
    </script>
@endif
</x-app-layout>















