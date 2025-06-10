
<div
    class="relative flex size-full min-h-screen flex-col bg-slate-50 group/design-root overflow-x-hidden"
    style='--select-button-svg: url(&apos;data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2724px%27 height=%2724px%27 fill=%27rgb(73,112,156)%27 viewBox=%270 0 256 256%27%3e%3cpath d=%27M181.66,170.34a8,8,0,0,1,0,11.32l-48,48a8,8,0,0,1-11.32,0l-48-48a8,8,0,0,1,11.32-11.32L128,212.69l42.34-42.35A8,8,0,0,1,181.66,170.34Zm-96-84.68L128,43.31l42.34,42.35a8,8,0,0,0,11.32-11.32l-48-48a8,8,0,0,0-11.32,0l-48,48A8,8,0,0,0,85.66,85.66Z%27%3e%3c/path%3e%3c/svg%3e&apos;); font-family: "Work Sans", "Noto Sans", sans-serif;'
>

    <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#e7edf4] px-10 py-3">
            <div class="flex items-center gap-4 text-[#0d141c]">

                <h2 class="text-[#0d141c] text-lg font-bold leading-tight tracking-[-0.015em]">DigiPro Exercise</h2>
            </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
            <div class="layout-content-container flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-1">
                <div class="flex flex-wrap justify-between gap-3 p-4"><p class="text-[#0d141c] tracking-light text-[32px] font-bold leading-tight min-w-72">Create Quiz</p></div>
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Full Name</p>


                        {{$fullName}}
                        <input wire:model="fullName"
                            placeholder="Enter your full name"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                        />
                    </label>
                </div>
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Email</p>
                        <input wire:model="email"
                            placeholder="Enter your email"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"

                        />
                    </label>
                </div>
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Number of Questions</p>
                        <input
                            wire:model="numberOfQuestions"
                            placeholder="Enter the number of questions"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"

                        />
                    </label>
                </div>
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Difficulty</p>
                        <select
                            wire:model="difficulty"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 bg-[image:--select-button-svg] placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                        >
                            <option value="">Select difficulty</option>
                            <option value="easy">Easy</option>
                            <option value="medium">Medium</option>
                            <option value="hard">Hard</option>
                        </select>
                    </label>
                </div>
                <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#0d141c] text-base font-medium leading-normal pb-2">Type</p>
                        <select
                            wire:model="type"
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border border-[#cedae8] bg-slate-50 focus:border-[#cedae8] h-14 bg-[image:--select-button-svg] placeholder:text-[#49709c] p-[15px] text-base font-normal leading-normal"
                        >
                            <option value="">Select type</option>
                            <option value="multiple_choice">Multiple choice</option>
                            <option value="true_false">True / false</option>
                        </select>
                    </label>
                </div>
                <div class="flex px-4 py-3">
                    <button wire:click="yo"
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 flex-1 bg-[#0c77f2] text-slate-50 text-sm font-bold leading-normal tracking-[0.015em]"
                    >
                        <span class="truncate">Create Quiz</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

