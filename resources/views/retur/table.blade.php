@foreach ($list??[] as $key => $l)
<tr>
    <td scope="row" class="index-col">{{ ++$key }}</td> 
    <td>{{ $l->id }}</td>
    <td>{{ $l->created_at }}</td>
    <td style="color: {{ $l->statusColor("status") }}">
        {{ $l->status }}
    </td>
    <td class="d-flex justify-content-center gap-1">
        <a href="{{ route('retur') }}/{{ $l->id }}/detail">
            <button class="btn btn-primary">
                <i class="fas fa-info-circle"></i>
            </button>
        </a>
    </td>
  </tr>
@endforeach