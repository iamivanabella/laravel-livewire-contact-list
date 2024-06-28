<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Activity Logs') }}
                        </h2>
                    </header>
                    <div class="list-group mt-6">
                    @foreach ($activities as $activity)
                        <a href="#" class="list-group-item list-group-item-action py-4" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                            <p class="mb-1">{{ $activity->causer ? $activity->causer->name : 'System' }} - {{ $activity->description }}</p>
                                <small>{{ $activity->created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                    @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
