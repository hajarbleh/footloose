@if($users->count())
<table id="userTable" class="table table-striped table-bordered display" cellspacing="0" width="100%">
    <thead><tr><th>No.</th><th>Email</th><th>Nama</th><th>Alamat</th><th>Kota</th><th>Provinsi</th><th>Kode pos</th><th>No. Telepon</th><th>Birthday</th><th>Line ID</th></tr></thead>
    <tbody>
        @php $count = 1; @endphp
        @foreach($users as $user)
        <tr>
            <td>@php echo $count++ @endphp</td>
            @if($user->email)
                <td>{{$user->email}}</td>
            @else
                <td>-</td>
            @endif
            @if($user->name)
                <td>{{$user->name}}</td>
            @else
                <td>-</td>
            @endif
            @if($user->address)
                <td>{{$user->address}}</td>
            @else
                <td>-</td>
            @endif
            @if($user->city)
                <td>{{$user->city}}</td>
            @else
                <td>-</td>
            @endif
            @if($user->state)
                <td>{{$user->state}}</td>
            @else
                <td>-</td>
            @endif
            @if($user->postal_code)
                <td>{{$user->postal_code}}</td>
            @else
                <td>-</td>
            @endif
            @if($user->phone)
                <td>{{$user->phone}}</td>
            @else
                <td>-</td>
            @endif
            @if($user->birthday)
                <td>{{$user->birthday}}</td>
            @else
                <td>-</td>
            @endif
            @if($user->line)
                <td>{{$user->line}}</td>
            @else
                <td>-</td>
            @endif
            
        </tr>
        @endforeach
    </tbody>
</table>

@else
<div class="alert alert-warning">
        <i class="fa fa-exclamation-triangle"></i> No Transactions
</div>
@endif