<div class="wk-timeline">
    @foreach ($history as $item)
        <div class="wk-timeline-item">
            <div class="wk-timeline-date">{{ $item->date }}</div>
            <div class="wk-timeline-msg">{{ $item->message }}</div>
        </div>
    @endforeach
</div>