<div class="timeline-body">
        <p>
            @if($recentActivity->activity["type"] == 'created')
                <b>Jobcard created</b>
            @elseif($recentActivity->activity["type"] == 'client_added')
                <a href="#">{{ $recentActivity->activity["company"]["name"] ? $recentActivity->activity["company"]["name"]:'____' }}</a>
                added as <b>jobcard client</b>
            @elseif($recentActivity->activity["type"] == 'status_changed')
                Status update from <b>{{ $recentActivity->activity["old_status"] ? $recentActivity->activity["old_status"]:'____' }}</b> to 
                <b>{{ $recentActivity->activity["new_status"] ? $recentActivity->activity["new_status"]:'____' }}</b>
            @elseif($recentActivity->activity["type"] == 'client_removed')
                <a href="#">{{ $recentActivity->activity["company"]["name"] ? $recentActivity->activity["company"]["name"]:'____' }}</a>
                removed as <b>jobcard client</b>
            @elseif($recentActivity->activity["type"] == 'contractor_added')
                <a href="#">{{ $recentActivity->activity["company"]["name"] ? $recentActivity->activity["company"]["name"]:'____' }}</a>
                added to list of <b>contractors</b>
            @elseif($recentActivity->activity["type"] == 'contractor_removed')
                <a href="#">{{ $recentActivity->activity["company"]["name"] ? $recentActivity->activity["company"]["name"]:'____' }}</a>
                removed from list of <b>contractors</b>
            @elseif($recentActivity->activity["type"] == 'contact_added')
                <a href="{{ route('profile-show', [$recentActivity->activity["contact"]["id"]]) }}">
                    {{ $recentActivity->activity["contact"]["first_name"] ? $recentActivity->activity["contact"]["first_name"]:'____' }}
                    {{ $recentActivity->activity["contact"]["last_name"] ? $recentActivity->activity["contact"]["last_name"]:'____' }}
                </a>
                added as <b>client contact</b>
            @endif

            by
            <a href="{{ route('profile-show', [$recentActivity->createdBy->id]) }}">
            {{ $recentActivity->createdBy->first_name ? $recentActivity->createdBy->first_name:'____' }}
            {{ $recentActivity->createdBy->last_name ? $recentActivity->createdBy->last_name:'____' }}
            </a>
        </p>
    </div>
<div class="timeline-footer d-flex align-items-center">
    <span class="ml-auto font-weight-bold mt-2">
        <i class="icon-clock icons"></i> 
        {{ $recentActivity->created_at ? Carbon\Carbon::parse($recentActivity->created_at)->format('d M Y @ h:m'):'____' }}
    </span>
</div>