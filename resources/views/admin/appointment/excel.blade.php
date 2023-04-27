<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($all as $data)
        <tr>
            <td>{{ $data->conus_name }}</td>
            <td>{{ $data->conus_email }}</td>
            <td>{{ $data->conus_phone }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
