<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Menu') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Desempenho') }}</p>
                </a>
            </li>
            <li>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-0.5">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Perfil do usuario') }}</p>
                            </a>
                        </li>
                    
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'Analises') class="active " @endif>
                <a href="{{ route('pages.Analises') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Analises') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
