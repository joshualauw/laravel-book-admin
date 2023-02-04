@foreach ($list??[] as $key => $l)
<tr>
    <td scope="row" class="index-col">{{ ++$key }}</td> 
    <td>{{ $l->id }}</td>
    <td>{{ $l->created_at }}</td>
    <td style="color: {{ $l->statusColor("status") }}">
        {{ $l->status }}
    </td>
    <td class="d-flex justify-content-center gap-1">
        <a href="{{ route('pengambilan') }}/{{ $l->id }}/detail">
            <button class="btn btn-primary">
                <i class="fas fa-info-circle"></i>
            </button>
        </a>
        <form action="{{ route('pengambilan') }}/{{ $l->id }}/destroy" method="POST">
            @csrf   
            @if ($l->retur == null && $l->status == "diterima" && $user->nik == $l->pemohon->nik)
                <button type="submit" name="action" value="retur" class="btn btn-success"><i class="fas fa-undo-alt"></i></button>
            @elseif ($l->status == "menunggu" && $user->nik == $l->pemohon->nik)
                <button type="submit" name="action" value="cancel" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
            @endif
        </form>
    </td>
  </tr>
@endforeach