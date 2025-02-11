@extends('layouts.app')

@section('content')
    <style>
        .highlight-text {
            background-color:rgb(10, 255, 5); /* Yellow highlight for text */
            font-weight: bold; /* Optional: make the text bold */
        }
    </style>

    <div class="container mt-1">
        <h1 class="text-center mb-2 text-bold"> {{ $company_name ?? "DRS" }} </h1>
        <input type="text" class="form-control mb-4" placeholder="Search for lost documents by name, number, type or location..." id="searchInput" onkeyup="filterTable()">

        <table class="table table-bordered" id="documentTable">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Document Type</th>
                    <th>Document Number</th>
                    <th>Location (County)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foundDocumentsRecord as $foundDocument)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td>{{ $foundDocument['name'] }}</td>
                        <td>{{ $foundDocument['document_type'] }}</td>
                        <td>{{ $foundDocument['document_id'] }}</td>
                        <td>{{ $foundDocument['location'] }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Contact Us</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
    function filterTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('documentTable');
        const tr = table.getElementsByTagName('tr');

        // Reset all rows and remove highlights
        for (let i = 1; i < tr.length; i++) {
            const td = tr[i].getElementsByTagName('td');
            for (let j = 0; j < td.length; j++) {
                // Check if the cell contains a button
                if (td[j].querySelector('a.btn')) {
                    // Preserve the button HTML
                    const buttonHTML = td[j].innerHTML.match(/<a.*<\/a>/);
                    td[j].innerHTML = buttonHTML ? buttonHTML[0] : td[j].textContent; // Reset to original text or keep button
                } else {
                    // Reset to original text
                    td[j].innerHTML = td[j].textContent; 
                }
            }
            tr[i].style.display = ""; // Reset display
        }

        // If the input is empty, return early
        if (!filter) {
            return;
        }

        // Filter rows and highlight matching text
        for (let i = 1; i < tr.length; i++) {
            const td = tr[i].getElementsByTagName('td');
            let found = false;
            for (let j = 0; j < td.length - 1; j++) { // Exclude the action column
                if (td[j]) {
                    const txtValue = td[j].textContent;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                        // Highlight matching text
                        const regex = new RegExp(`(${filter})`, 'gi'); // Create a regex for the filter
                        td[j].innerHTML = txtValue.replace(regex, '<span class="highlight-text">$1</span>'); // Highlight the matching text
                    }
                }
            }
            tr[i].style.display = found ? "" : "none"; // Show or hide the row
        }
    }
</script>
@endsection