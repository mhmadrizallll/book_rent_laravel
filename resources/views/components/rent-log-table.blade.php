<div>
    {{-- {{$rentlog}} --}}
    {{-- {{$rentlog}} --}}
    <table class="table">
        <thead>
            <tr>
                <td class="bg bg-secondary text-white">No</td>
                <td class="bg bg-secondary text-white">User</td>
                <td class="bg bg-secondary text-white">Book</td>
                <td class="bg bg-secondary text-white">Rent Date</td>
                <td class="bg bg-secondary text-white">Return Date</td>
                <td class="bg bg-secondary text-white">Actual Return Date</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentlog as $item) 
                <tr class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'table-danger' : 'table-success')}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->book->title}}</td>
                    <td>{{$item->rent_date}}</td>
                    <td>{{$item->return_date}}</td>
                    <td>{{$item->actual_return_date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>