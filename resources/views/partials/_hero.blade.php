<section class="relative h-72  flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div class="absolute  left-0 w-full bg-no-repeat bg-center  top-[-60px] h-[35rem] opacity-90 z-[-1]"
        style="background-image: url('images/bgo4.jpg')"></div>
    <div class="z-10 relative top-20">
        <h1 class="text-6xl font-bold uppercase text-white">
            Adventure<span class="text-orange-500"> Time</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4">
            Unite, Explore, Thrive: Where Every Journey Is an Adventure!
        </p>
        <div>
            @auth
                <a href="/adventure/create"
                    class="inline-block border-2 border-orange-500 text-orange-500 py-2 px-4 rounded-xl uppercase mt-2 hover:text-white hover:border-white">Share</a>
            @else
                <a href="/register"
                    class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Sign
                    Up to share an adventure</a>
            @endauth
        </div>
    </div>
</section>
