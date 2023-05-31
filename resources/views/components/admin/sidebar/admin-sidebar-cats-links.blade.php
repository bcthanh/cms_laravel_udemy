<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCats" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Categories</span>
    </a>
    <div id="collapseCats" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Categories</h6>
            <a class="collapse-item" href="{{route('cat.create')}}">Create a Category</a>
            <a class="collapse-item" href="{{route('cat.index')}}">View All Categories</a>
        </div>
    </div>
</li>