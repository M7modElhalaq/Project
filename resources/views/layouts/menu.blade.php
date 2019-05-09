<!-- menu -->
<section id="menu">
    <div class="container">
        <div class="menu-area">
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('FrontIndex')}}">Home</a></li>
                        @foreach($categories as $category)
                            <li><a class="aa-browse-btn" href="{{route('FrontProducts', ['id' => $category->id, 'category' => $category->name])}}">{{$category->name}}
                                    @if(count($category->sub_categories) > 0)
                                        <span class="caret"></span>
                                    @endif
                                </a>
                                @if(count($category->sub_categories) > 0)
                                    <ul class="dropdown-menu">
                                        @foreach($category->sub_categories as $sub)
                                            <li><a class="aa-browse-btn" href="{{route('FrontProducts', ['id' => $sub->id, 'category' => $sub->name])}}" style="border: none;">{{$sub->name}}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
</section>