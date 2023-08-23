</!DOCTYPE html>
<html>
<head>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .alert {
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-success {
        background-color: #dff0d8;
        border-color: #d0e9c6;
        color: #3c763d;
    }

    .alert-danger {
        background-color: #f2dede;
        border-color: #ebccd1;
        color: #a94442;
    }
</style>

<style>

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 2px;
}

.pagination a:hover:not(.active) {
  background-color: blue;
  border-radius: 5px;
}
</style>


</head>
<body>

</body>
</html>
<x-app-layout>

    <!-- Optional theme -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Blood Donations') }}
        </h2>
    </x-slot>

    <div class="py-12">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             @if(session('success'))
    <div class="alert alert-success" style="align-content: center;">
        {{ session('success') }}

        @if(session('error'))
    <div class="alert alert-danger" style="align-content: center;">
        {{ session('error') }}
    </div>
@endif

    </div>
@endif
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <table class="table-auto w-full">
        @if($donations->isEmpty())
            <p style="center">No donations found.</p>
        @else
            <thead class="bg-red-500 text-white">
                <tr>
                    <th class="px-6 py-2">#</th>
                    <th class="px-6 py-2">Donor Name</th>
                    <th class="px-6 py-2">Blood Group</th>
                    <th class="px-6 py-2">Date of Donation</th>
                    <th class="px-6 py-2">Quantity (in ml)</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1;
                @endphp
                @foreach($donations as $donation)
                    <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="border px-6 py-2">{{ $donations->firstItem() + $loop->index }}</td>
                        <td class="border px-6 py-2">{{ $donation->donor_name }}</td>
                        <td class="border px-6 py-2">{{ $donation->blood_group }}</td>
                        <td class="border px-6 py-2">{{ $donation->formatted_donation_date }}</td>
                        <td class="border px-6 py-2">{{ $donation->quantity_ml }}</td>
                    </tr>
                    @php
                        $counter++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        {{ $donations->links() }}
    </div>
</div>
@endif

        </div>
    </div>

</x-app-layout>
@if(session('success'))
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1400); 
        
    </script>
@endif
