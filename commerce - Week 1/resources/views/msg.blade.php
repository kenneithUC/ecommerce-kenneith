@extends('template.main')
@section('body')
<h3>Contact Information</h3>

@if ($contactData)
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactData as $index => $contact)
            <tr>
                <td>{{ $contact['name'] }}</td>
                <td>{{ $contact['email'] }}</td>
                <td>{{$contact['phone']}}</td>
                <td>{{ $contact['message'] }}</td>
                <td>
                    <form action="{{ route('contact.delete', ['index' => $index]) }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No contact information found.</p>
@endif
@endsection