<x-app-layout>
    <div class="container py-8 ">
        @foreach ($categories as $category)
            <section class="mb-6">
                <div class="flex items-center mb-2 ">
                    <h1 class="text-lg uppercase font-semibold text-white">
                        {{ $category->name }}
                    </h1>
                    <a href="{{route('categories.show', $category )}}" class="text-cyan-400 ml-4 font-semibold hover:text-cyan-200 hover:underline ">Ver más...</a>
                </div>
                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach

    </div>

    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 2.3,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2.8,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3.6,
                                slidesToScroll: 4,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },
                    ]
                });
            });
        </script>
    @endpush

</x-app-layout>
