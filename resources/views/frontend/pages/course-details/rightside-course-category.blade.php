<div class="card card-item">
    <div class="card-body">
        <h3 class="card-title fs-18 pb-2">Course Categories</h3>
        <div class="divider"><span></span></div>
        <ul class="generic-list-item">
            @foreach ($allCategory as $item)
                <li><a href="#">{{ $item->name }}</a></li>
            @endforeach
            
        </ul>
    </div>
</div><!-- end card -->