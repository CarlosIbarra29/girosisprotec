                                    <div class="d-flex flex-column mb-5 @if ($position == "right") align-items-end @else align-items-start @endif">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2">
                                                @if($position == "right") 
                                                <a href="#"
                                                    class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Tu</a>
                                                @endif
                                            </div>
                                            <x-conversations-list :avatar="$avatar" :name="$name" />
                                            <span class="text-muted font-size-sm">{{ $time }}</span>
                                        </div>
                                        <div
                                            class="mt-2 rounded p-5 font-weight-bold font-size-lg max-w-400px @if ($position == "right") bg-primary text-white @else bg-secondary text-dark-70 @endif">
                                            {{ $message }}
                                            </div>
                                    </div>