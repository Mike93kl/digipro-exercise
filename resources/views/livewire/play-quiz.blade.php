

<div class="px-40 flex flex-1 justify-center py-5">




    <div class="layout-content-container flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-1">

        @if ($errorFlashMessage)
            <div
                x-data="{show: true}"
                x-show="show"
                x-init="setTimeout(() => $wire.resetErrorMsg(), 5000)"
                id="error-msg"
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                role="alert">

                <span class="block sm:inline">{{$errorFlashMessage }}</span>
                <span
                    class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                    id="close-error-msg"
                >

        </span>
            </div>
        @endif

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


        <div class="flex flex-col gap-3 p-4">
            <div class="flex gap-6 justify-between"><p class="text-[#111418] text-base font-medium leading-normal">{{$index+1}}/{{$numOfQuestions}}</p></div>
            <div class="rounded bg-[#dce0e5]"><div class="h-2 rounded bg-[#111418]" style="width: {{(($index + 1) / ($numOfQuestions)) * 100}}%;"></div></div>
        </div>
        <h2 class="text-[#111418] tracking-light text-[28px] font-bold leading-tight px-4 text-left pb-3 pt-5">{{html_entity_decode($questions[$index]['question'])}}</h2>
        <div class="flex flex-col gap-3 p-4" x-data="{selected: ''}"
             x-init="
        (() => {
            const options = {{ Js::from($questions[$index]) }};

            if (options.submitted_answer) {
                selected = options.submitted_answer;
                return;
            }


            selected = '';
        })()
    "
        >

           @foreach($questions[$index]['answers'] as $answer)

                <label class="flex items-center gap-4 rounded-lg border border-solid border-[#dce0e5] p-[15px]">
                    <input
                        x-model="selected"
                        :value="'{{html_entity_decode($answer)}}'"
                        type="radio"
                        class="h-5 w-5 border-2 border-[#dce0e5] bg-transparent text-transparent checked:border-[#111418] checked:bg-[image:--radio-dot-svg] focus:outline-none focus:ring-0 focus:ring-offset-0 checked:focus:border-[#111418]"
                        name="radio_answer"

                    />
                    <div class="flex grow flex-col"><p class="text-[#111418] text-sm font-medium leading-normal">{{$answer}}</p></div>
                </label>

           @endforeach

               <div class="flex justify-stretch">
                   <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-between">
                       @if($hasPrev)
                           <button
                               wire:click="previous()"
                               class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-bold leading-normal tracking-[0.015em]"
                           >
                               <span class="truncate">Previous</span>
                           </button>
                       @endif
                       @if($showFinish || $hasNext)
                           <button
                               @click="$wire.submitAnswer(selected)"
                               class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#1978e5] text-white text-sm font-bold leading-normal tracking-[0.015em]"
                           >
                               <span class="truncate">{{$showFinish ? 'Finish' : 'Next'}}</span>
                           </button>
                       @endif


                   </div>
               </div>

        </div>

    </div>
</div>



