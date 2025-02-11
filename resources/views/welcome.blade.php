@extends('layouts.app')

@section('content')
    <div class="container mt-1">
        <h1 class="text-center mb-2 text-bold"> {{ $company_name ?? "DRS" }} </h1>
        <input type="text" class="form-control mb-4" placeholder="Search for lost documents by name, number, type or location..." id="searchInput" onkeyup="filterTable()">

        <table class="table table-bordered" id="documentTable">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Document type</th>
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
                            <a href="" class="btn btn-sm btn-info">Contact Us</a>
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

            for (let i = 1; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td');
                let found = false;
                for (let j = 0; j < td.length - 1; j++) { // Exclude the action column
                    if (td[j]) {
                        const txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                tr[i].style.display = found ? "" : "none";
            }
        }
    </script>
@endsection