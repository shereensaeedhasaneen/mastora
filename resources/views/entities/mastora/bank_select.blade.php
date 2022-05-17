<select id="select" class="select-option wide">
    <option disabled selected>فرع بنك ناصر</option>
  @foreach ($branches as $branch )
    <option value="{{$branch->id}}" >{{$branch->name}}</option>
  @endforeach
  </select>