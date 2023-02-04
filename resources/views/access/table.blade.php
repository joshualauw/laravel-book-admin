@foreach ($list??[] as $key => $l)
    <tr>
      <td scope="row" class="index-col">{{ ++$key }}</td> 
      <td>{{ $l->nama }}</td>
      <td><input type="checkbox" name="create[]" value="{{ $filterBy == "pegawai" ? $l->nik : $l->id }}" {{ $l->access[$index]->create ? "checked" : "" }}></td>
      <td><input type="checkbox" name="read[]" value="{{ $filterBy == "pegawai" ? $l->nik : $l->id }}" {{ $l->access[$index]->read? "checked" : "" }} ></td>
      <td><input type="checkbox" name="update[]" value="{{ $filterBy == "pegawai" ? $l->nik : $l->id }}" {{ $l->access[$index]->update? "checked" : "" }}></td>
      <td><input type="checkbox" name="delete[]" value="{{ $filterBy == "pegawai" ? $l->nik : $l->id }}" {{ $l->access[$index]->delete? "checked" : "" }}></td>
      <input type="hidden" name="who[]" value="{{ $filterBy == "pegawai" ? $l->nik : $l->id }}">
    </tr>
@endforeach
