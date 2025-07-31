
<div class="relative">
    <!-- Button to toggle the hidden class -->
    <button
        class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-stone-800 hover:bg-stone-700 relative bg-gradient-to-b from-stone-700 to-stone-800 border-stone-900 text-stone-50 rounded-lg hover:bg-gradient-to-b hover:from-stone-800 hover:to-stone-800 hover:border-stone-900 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.25),inset_0_-2px_0px_rgba(0,0,0,0.35)] after:pointer-events-none transition antialiased"
        onclick="document.getElementById('sidebar').classList.toggle('translate-x-0');"
    >
        Toggle Sidebar
    </button>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="z-10 fixed top-0 left-0 h-screen w-64 transform -translate-x-[calc(100%+10px)] transition-transform duration-300"
    >
        <div class="w-full rounded-lg border shadow-sm overflow-hidden bg-white border-stone-200 shadow-stone-950/5 max-w-[280px] h-screen">
            <div class="w-[calc(100%-16px)] rounded m-2 mx-3 mb-0 mt-3 flex h-max items-center gap-2">
                <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/refs/heads/master/david-ui/logo-davidui.svg" alt="brand" class="inline-block object-cover object-center w-6 h-6 rounded-sm" />
                <p class="font-sans antialiased text-base text-current font-semibold">Material Tailwind</p>
            </div>
            <div class="w-full h-max rounded p-3">
                <div class="relative w-full">
                    <input placeholder="Search here..." type="search" class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-2 pr-9 pl-2.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                    <span class="pointer-events-none absolute top-1/2 -translate-y-1/2 right-2 text-stone-600/70 peer-focus:text-stone-800 peer-focus:text-stone-800 dark:peer-hover:text-white dark:peer-focus:text-white transition-all duration-300 ease-in overflow-hidden w-4 h-4"><svg width="1.5em" height="1.5em" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-full w-full"><path d="M17 17L21 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 11C3 15.4183 6.58172 19 11 19C13.213 19 15.2161 18.1015 16.6644 16.6493C18.1077 15.2022 19 13.2053 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          </span>
                </div>
                <ul class="flex flex-col gap-0.5 min-w-60 mt-3">
                    <li href="#" class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-stone-600 hover:text-stone-800 dark:hover:text-white hover:bg-stone-200 focus:bg-stone-200 focus:text-stone-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
            <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-[18px] w-[18px]"><path d="M7 9L12 12.5L17 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2 17V7C2 5.89543 2.89543 5 4 5H20C21.1046 5 22 5.89543 22 7V17C22 18.1046 21.1046 19 20 19H4C2.89543 19 2 18.1046 2 17Z" stroke="currentColor"></path></svg>
            </span>Inbox
                        <span class="grid place-items-center shrink-0 ps-2.5 ms-auto">
              <div class="relative inline-flex w-max items-center border font-sans font-medium rounded-md text-xs p-0.5 bg-stone-800/10 border-transparent text-stone-800 shadow-none">
                <span class="font-sans text-current leading-none my-0.5 mx-1.5">14</span>
              </div>
            </span>
                    </li>
                    <li href="#" class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-stone-600 hover:text-stone-800 dark:hover:text-white hover:bg-stone-200 focus:bg-stone-200 focus:text-stone-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
            <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-[18px] w-[18px]"><g clip-path="url(#clip0_2476_13290)"><path d="M22.1525 3.55321L11.1772 21.0044L9.50686 12.4078L2.00002 7.89795L22.1525 3.55321Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.45557 12.4436L22.1524 3.55321" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
            </span>Sent</li>
                    <li href="#" class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-stone-600 hover:text-stone-800 dark:hover:text-white hover:bg-stone-200 focus:bg-stone-200 focus:text-stone-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
            <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-[18px] w-[18px]"><path d="M4 21.4V2.6C4 2.26863 4.26863 2 4.6 2H16.2515C16.4106 2 16.5632 2.06321 16.6757 2.17574L19.8243 5.32426C19.9368 5.43679 20 5.5894 20 5.74853V21.4C20 21.7314 19.7314 22 19.4 22H4.6C4.26863 22 4 21.7314 4 21.4Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 2V5.4C16 5.73137 16.2686 6 16.6 6H20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </span>Drafts</li>
                    <li href="#" class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-stone-600 hover:text-stone-800 dark:hover:text-white hover:bg-stone-200 focus:bg-stone-200 focus:text-stone-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
            <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-[18px] w-[18px]"><path d="M9.5 14.5L3 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M5.00007 9.48528L14.1925 18.6777L15.8895 16.9806L15.4974 13.1944L21.0065 8.5211L15.1568 2.67141L10.4834 8.18034L6.69713 7.78823L5.00007 9.48528Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </span>Pins</li>
                    <li href="#" class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-stone-600 hover:text-stone-800 dark:hover:text-white hover:bg-stone-200 focus:bg-stone-200 focus:text-stone-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
            <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-[18px] w-[18px]"><path d="M7 6L17 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7 9L17 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9 17H15" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 12H2.6C2.26863 12 2 12.2686 2 12.6V21.4C2 21.7314 2.26863 22 2.6 22H21.4C21.7314 22 22 21.7314 22 21.4V12.6C22 12.2686 21.7314 12 21.4 12H21M3 12V2.6C3 2.26863 3.26863 2 3.6 2H20.4C20.7314 2 21 2.26863 21 2.6V12M3 12H21" stroke="currentColor"></path></svg>
            </span>Archive</li>
                    <li href="#" class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent text-stone-600 hover:text-stone-800 dark:hover:text-white hover:bg-stone-200 focus:bg-stone-200 focus:text-stone-800 dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70">
            <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-[18px] w-[18px]"><path d="M3.03919 4.2939C3.01449 4.10866 3.0791 3.92338 3.23133 3.81499C3.9272 3.31953 6.3142 2 12 2C17.6858 2 20.0728 3.31952 20.7687 3.81499C20.9209 3.92338 20.9855 4.10866 20.9608 4.2939L19.2616 17.0378C19.0968 18.2744 18.3644 19.3632 17.2813 19.9821L16.9614 20.1649C13.8871 21.9217 10.1129 21.9217 7.03861 20.1649L6.71873 19.9821C5.6356 19.3632 4.90325 18.2744 4.73838 17.0378L3.03919 4.2939Z" stroke="currentColor"></path><path d="M3 5C5.57143 7.66666 18.4286 7.66662 21 5" stroke="currentColor"></path></svg>
            </span>Trash</li>
                    <hr class="-mx-3 my-3 border-stone-200" />
                    <li>
                        <div data-dui-toggle="collapse"
                             data-dui-target="#sidebarCollapseListWithBurger"
                             aria-expanded="false"
                             aria-controls="sidebarCollapseListWithBurger"
                             class="flex items-center justify-between min-w-60 cursor-pointer py-1.5 px-2.5 rounded-md align-middle transition-all duration-300 ease-in text-stone-600 hover:text-stone-800 dark:text-stone-300 dark:hover:text-white hover:bg-stone-200 dark:hover:bg-stone-700 focus:bg-stone-200 dark:focus:bg-stone-700 focus:text-stone-800 dark:focus:text-white">
              <span class="flex items-center">
                <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-4 w-4 me-3"><path d="M7 12.5C7.27614 12.5 7.5 12.2761 7.5 12C7.5 11.7239 7.27614 11.5 7 11.5C6.72386 11.5 6.5 11.7239 6.5 12C6.5 12.2761 6.72386 12.5 7 12.5Z" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 12.5C12.2761 12.5 12.5 12.2761 12.5 12C12.5 11.7239 12.2761 11.5 12 11.5C11.7239 11.5 11.5 11.7239 11.5 12C11.5 12.2761 11.7239 12.5 12 12.5Z" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 12.5C17.2761 12.5 17.5 12.2761 17.5 12C17.5 11.7239 17.2761 11.5 17 11.5C16.7239 11.5 16.5 11.7239 16.5 12C16.5 12.2761 16.7239 12.5 17 12.5Z" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                More
              </span>

                            <span data-dui-icon class="grid place-items-center shrink-0 transition-transform duration-300 ease-in-out">
                <svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-4 w-4 stroke-[1.5] dark:stroke-stone-300">
                  <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
                        </div>
                        <div class="overflow-hidden transition-[max-height] duration-300 ease-in-out max-h-0" id="sidebarCollapseListWithBurger">
                            <ul class="flex flex-col gap-0.5 min-w-60">
                                <li class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-stone-600 hover:text-stone-800 dark:text-stone-300 dark:hover:text-white hover:bg-stone-200 dark:hover:bg-stone-700 focus:bg-stone-200 dark:focus:bg-stone-700 focus:text-stone-800 dark:focus:text-white">
                                    Inbox
                                </li>
                                <li class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-stone-600 hover:text-stone-800 dark:text-stone-300 dark:hover:text-white hover:bg-stone-200 dark:hover:bg-stone-700 focus:bg-stone-200 dark:focus:bg-stone-700 focus:text-stone-800 dark:focus:text-white">
                                    Trash
                                </li>
                                <li class="pl-10 flex items-center cursor-pointer py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in bg-transparent text-stone-600 hover:text-stone-800 dark:text-stone-300 dark:hover:text-white hover:bg-stone-200 dark:hover:bg-stone-700 focus:bg-stone-200 dark:focus:bg-stone-700 focus:text-stone-800 dark:focus:text-white">
                                    Settings
                                </li>
                            </ul>
                        </div>
                    </li>
                    <hr class="-mx-3 my-3 border-stone-200" />
                    <li class="flex items-center py-1.5 px-2.5 rounded-md align-middle select-none font-sans transition-all duration-300 ease-in aria-disabled:opacity-50 aria-disabled:pointer-events-none bg-transparent dark:hover:text-white dark:focus:text-white dark:data-[selected=true]:text-white dark:bg-opacity-70 text-red-500 hover:bg-red-500/10 hover:text-error focus:bg-error/10 focus:text-error">
            <span class="grid place-items-center shrink-0 me-2.5"><svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-[18px] w-[18px]"><path d="M12 12H19M19 12L16 15M19 12L16 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19 6V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </span>Logout</li>
                </ul>
            </div>
            <div class="w-full px-3.5 pt-2 pb-3.5 rounded mt-3.5">
                <div class="w-full rounded-lg border overflow-hidden bg-stone-800 border-stone-950 shadow-stone-950/25 shadow-none">
                    <div class="w-[calc(100%-16px)] h-max rounded m-3"><svg width="1.5em" height="1.5em" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor" class="h-10 w-10 text-stone-50"><path d="M21 7.35304L21 16.647C21 16.8649 20.8819 17.0656 20.6914 17.1715L12.2914 21.8381C12.1102 21.9388 11.8898 21.9388 11.7086 21.8381L3.30861 17.1715C3.11814 17.0656 3 16.8649 3 16.647L2.99998 7.35304C2.99998 7.13514 3.11812 6.93437 3.3086 6.82855L11.7086 2.16188C11.8898 2.06121 12.1102 2.06121 12.2914 2.16188L20.6914 6.82855C20.8818 6.93437 21 7.13514 21 7.35304Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3.52844 7.29357L11.7086 11.8381C11.8898 11.9388 12.1102 11.9388 12.2914 11.8381L20.5 7.27777" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 21L12 12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path><path d="M11.6914 11.8285L3.89139 7.49521C3.49147 7.27304 3 7.56222 3 8.01971V16.647C3 16.8649 3.11813 17.0656 3.30861 17.1715L11.1086 21.5048C11.5085 21.727 12 21.4378 12 20.9803V12.353C12 12.1351 11.8819 11.9344 11.6914 11.8285Z" fill="currentColor" stroke="currentColor" stroke-linejoin="round"></path></svg>
                    </div>
                    <div class="w-full h-max rounded px-3.5 py-2.5">
                        <h6 class="font-sans antialiased font-bold text-base md:text-lg lg:text-xl mb-1 text-white">Upgrade to PRO</h6>
                        <small class="font-sans antialiased text-sm text-white/80">Upgrade to Material Tailwind PRO and get even more components, plugins, advanced features and premium.</small>
                    </div>
                    <div class="w-full px-3.5 pt-2 pb-3.5 rounded">
                        <a href="#" class="inline-flex items-center justify-center border align-middle select-none font-sans font-medium text-center duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed focus:shadow-none text-sm py-2 px-4 shadow-sm hover:shadow-md bg-stone-200 hover:bg-stone-100 relative bg-gradient-to-b from-white to-white border-stone-200 text-stone-700 rounded-lg hover:bg-gradient-to-b hover:from-stone-50 hover:to-stone-50 hover:border-stone-200 after:absolute after:inset-0 after:rounded-[inherit] after:box-shadow after:shadow-[inset_0_1px_0px_rgba(255,255,255,0.35),inset_0_-1px_0px_rgba(0,0,0,0.20)] after:pointer-events-none transition antialiased">Upgrade Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

