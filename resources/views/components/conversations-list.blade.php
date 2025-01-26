<div class="d-flex align-items-center @if(isset($subtext)) mb-3 chat-list-hoverable @endif chat-list-item" 
    @if(isset($conversationId)) onclick="window.location.href='{{ route('chat.to_user', $conversationId) }}'" @endif>
    @component('components.avatar', ['avatarUrl' => $avatar, 'name' => explode(' ', $name)[0]])
    @endcomponent
    <div class="d-flex flex-column">
        {{-- just the first name --}}
        @if(isset($conversationId))
            <a href="{{ route('chat.to_user', $conversationId) }}" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mr-2">{{ $name }}</a>
        @else
        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mr-2">{{ $name }}</a>
        @endif

        @if (isset($subtext))
            <span class="text-muted font-weight-bold font-size-sm">{{ $subtext }}</span>    
        @endif
    </div>
</div>