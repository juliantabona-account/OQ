@if($position % 2 == 0)
    <div class="timeline-wrapper timeline-wrapper-primary">
        <div class="timeline-badge"></div>
        <div class="timeline-panel">
            
            @include('layouts.recentActivity.dataset.data')
                    
        </div>
    </div>
@else
    <div class="timeline-wrapper timeline-inverted timeline-wrapper-primary">
        <div class="timeline-badge"></div>
        <div class="timeline-panel">
            
            @include('layouts.recentActivity.dataset.data')
                    
        </div>
    </div>
@endif