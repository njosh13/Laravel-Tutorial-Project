@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{$listing->logo ? asset ('storage/' . $listing->logo) :asset('/images/no-image.png')}}"alt=""/>
        <div>
            <h3 class="text-2xl">
                <div class="text-xl uppercase font-bold mb-4">  Objective:<a href="/listings/{{$listing->id}}">{{ $listing->title }} </div> </a>
            </h3>

            <div class="text-xl font-bold mb-4"> Department:{{ $listing->company }}</div>

            <x-listing-tags :tagsCsv="$listing->tags"/>

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>

        </div>
    </div>
</x-card>