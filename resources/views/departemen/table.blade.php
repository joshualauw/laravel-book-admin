@foreach ($list??[] as $key => $l)
  <tr>
    <th scope="row" class="index-col">{{ ++$key }}</th> 
    <td>{{ $l->nik }}</td>
    <td>{{ $l->username }}</td>
    <td>{{ $l->nama }}</td>
    <td>{{ $l->jabatan->nama }}</td>
    <td>{{ $l->tgl_lahir }}</td>
  </tr>
@endforeach