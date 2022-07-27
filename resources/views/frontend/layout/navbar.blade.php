
<?php
use App\Models\Section;
$sections = Section::sections();
//echo "<pre>" ; print_r($sections); die;
?>

<div class="topnav mt-5 pt-4">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    @foreach ($sections as $section)
                        @if (count($section['categories'])>0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="javascript:void(0);" id="topnav-sections" role="button" >
                                    <span key="t-sections">{{ $section['name'] }}</span> <div class="arrow-down"></div>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="topnav-sections">
                                    @foreach ($section['categories'] as $category)
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="{{ url($category['category_url']) }}" id="topnav-categories" role="button">
                                                <span key="t-categories">{{ $category['category_name'] }}</span> <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-categories">
                                                @foreach ($category['subcategories'] as $subcategory)
                                                <a href="{{ url($subcategory['category_url']) }}" class="dropdown-item" key="t-categories-elements">{{ $subcategory['category_name'] }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                         @endif
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>
