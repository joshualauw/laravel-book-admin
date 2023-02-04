@foreach ($list??[] as $l)
@if ($edit==null)
  <option value="{{ old("jabatan")??$l->id }}">{{ $l->nama }}</option>   
@else
  @if ($l->id == $edit->jabatan_id)
    <option value="{{ old("jabatan")??$l->id }}" selected>{{ $l->nama }}</option>   
  @else
    <option value="{{ old("jabatan")??$l->id }}">{{ $l->nama }}</option>   
  @endif
@endif       
@endforeach   