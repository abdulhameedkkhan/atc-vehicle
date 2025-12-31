@extends('layouts.admin')

@section('title', 'All Enquiries - ATC Japan')
@section('page-subtitle', 'Enquiries Management')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">All Enquiries</h1>
    <p class="text-gray-600">Manage and update status of all product enquiries</p>
</div>

@if(session('success'))
<div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="p-6">
        <table id="enquiriesTable" class="min-w-full divide-y divide-gray-200 display nowrap" style="width:100%">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables will populate this via AJAX -->
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
$(document).ready(function() {
    $('#enquiriesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.enquiries.datatable') }}",
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id', orderable: true, searchable: false },
            { data: 'user', name: 'user_id', orderable: false, searchable: true },
            { data: 'product', name: 'product_id', orderable: false, searchable: true },
            { data: 'message', name: 'message', orderable: true, searchable: true },
            { data: 'status', name: 'status', orderable: true, searchable: true },
            { data: 'date', name: 'created_at', orderable: true, searchable: false },
            { data: 'actions', name: 'actions', orderable: false, searchable: false },
        ],
        order: [[5, 'desc']],
        pageLength: 15,
        responsive: true,
        language: {
            processing: '<div class="flex items-center justify-center p-4"><i class="fas fa-spinner fa-spin text-indigo-600 text-2xl mr-2"></i> Loading...</div>',
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ enquiries",
            infoEmpty: "No enquiries available",
            infoFiltered: "(filtered from _MAX_ total enquiries)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            },
            zeroRecords: "No matching enquiries found"
        }
    });
});
</script>
@endsection
