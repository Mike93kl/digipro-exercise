<div class="px-40 flex flex-1 justify-center py-5">



    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">


        <div class="flex px-4 py-3 justify-center">
            <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#eaedf1] text-[#101418] gap-2 pl-4 text-sm font-bold leading-normal tracking-[0.015em]"
            >
                <div class="text-[#101418]" data-icon="ArrowLeft" data-size="20px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"
                        ></path>
                    </svg>
                </div>
                <a  href='/' class="truncate">Start Over</a>
            </button>
        </div>

        <div class="flex flex-wrap justify-between gap-3 p-4">
            <div class="flex min-w-72 flex-col gap-3">
                <p class="text-[#0d141c] tracking-light text-[32px] font-bold leading-tight">Results</p>
                <p class="text-[#49719c] text-sm font-normal leading-normal">Review your answers and see how you did.</p>
            </div>
        </div>

        @foreach($questions as $index => $question)

            <h3 class="text-[#0d141c] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Question {{$index+ 1}}</h3>
            <p class="text-[#0d141c] text-base font-normal leading-normal pb-3 pt-1 px-4">{{html_entity_decode($question['question'])}}</p>
            <div class="p-4 grid grid-cols-[20%_1fr] gap-x-6">
                <div class="col-span-2 grid grid-cols-subgrid border-t border-t-[#cedbe8] py-5">
                    <p class="text-[#49719c] text-sm font-normal leading-normal">Correct Answer</p>
                    <p class="text-[#0d141c] text-sm font-normal leading-normal">{{$question['correct_answer']}}</p>
                </div>
                <div class="col-span-2 grid grid-cols-subgrid border-t border-t-[#cedbe8] py-5">
                    <p class="text-[#49719c] text-sm font-normal leading-normal">Your Answer</p>
                    <p class="text-[#0d141c] text-sm font-normal leading-normal">{{$question['answered']}}</p>
                </div>
            </div>
            @if($question['correct'])
                <div class="flex items-center gap-4 bg-green-100 px-4 min-h-14">
                    <div class="text-[#0d141c] flex items-center justify-center rounded-lg bg-[#e7edf4] shrink-0 size-10" data-icon="Check" data-size="24px" data-weight="regular">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M229.66,77.66l-128,128a8,8,0,0,1-11.32,0l-56-56a8,8,0,0,1,11.32-11.32L96,188.69,218.34,66.34a8,8,0,0,1,11.32,11.32Z"></path>
                        </svg>
                    </div>
                    <p class="text-[#0d141c] text-base font-normal leading-normal flex-1 truncate">Correct</p>
                </div>

            @else
                <div class="flex items-center gap-4 bg-red-50 px-4 min-h-14">
                    <div class="text-[#0d141c] flex items-center justify-center rounded-lg bg-[#e7edf4] shrink-0 size-10" data-icon="X" data-size="24px" data-weight="regular">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                            <path
                                d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"
                            ></path>
                        </svg>
                    </div>
                    <p class="text-[#0d141c] text-base font-normal leading-normal flex-1 truncate">Incorrect</p>
                </div>
            @endif

        @endforeach

</div>
