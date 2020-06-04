<h2>Sidebar</h2>
@foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $item)
<ul >
    <li style="list-style:none">
        <a href="#main-{{ $item->id }}" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">

            <img src="{{ asset('images/categories/'. $item->image) }}" alt="" width="50" height="20">
            {{ $item->name }}

           </a>
    </li>
</ul>


  <div class="collapse" id="main-{{ $item->id }}">

    @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $item->id)->get() as $childitem)
    <ul>
        <li style="list-style:none">
            <a class="pl-4" href=""><img src="{{ asset('images/categories/'. $childitem->image) }}" alt="" width="30" height="20">
                {{ $childitem->name }}</a>
        </li>
    </ul>


    @endforeach

  </div>
  @endforeach

