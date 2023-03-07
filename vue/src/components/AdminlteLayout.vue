<template>
  <div :class="menu ? 'test' : 'overflow-hidden lg:overflow-visible'">
  <div :class="menu ? 'xl:pl-60 pt-14 min-h-screen w-screen transition-position lg:w-auto bg-gray-50 dark:bg-slate-800 dark:text-slate-100': 'xl:pl-60 ml-60 lg:ml-0 pt-14 min-h-screen w-screen transition-position lg:w-auto bg-gray-50 dark:bg-slate-800 dark:text-slate-100'">
    <nav :class="menu ? 'top-0 inset-x-0 fixed bg-gray-50 h-14 z-30 transition-position w-screen lg:w-auto dark:bg-slate-800 xl:pl-60' : 'top-0 inset-x-0 fixed bg-gray-50 h-14 z-30 transition-position w-screen lg:w-auto dark:bg-slate-800 xl:pl-60 ml-60 lg:ml-0'">
      <div class="flex lg:items-stretch xl:max-w-7xl xl:mx-auto">
        <div class="flex flex-1 items-stretch h-14">
          <div @click="menu=!menu" class="flex lg:hidden text-black hover:text-blue-500 py-2 px-3 items-center cursor-pointer dark:text-white dark:hover:text-slate-400">
            <span   class="inline-flex justify-center items-center w-6 h-6">
              <svg viewBox="0 0 24 24" width="24" height="24" class="inline-block">
                <path fill="currentColor" d="M19,13H3V11H19L15,7L16.4,5.6L22.8,12L16.4,18.4L15,17L19,13M3,6H13V8H3V6M13,16V18H3V16H13Z"></path>
              </svg>
            </span> 
          </div>
          <div class="hidden lg:flex xl:hidden text-black hover:text-blue-500 py-2 px-3 items-center cursor-pointer dark:text-white dark:hover:text-slate-400">
            <span class="inline-flex justify-center items-center w-6 h-6">
              <svg viewBox="0 0 24 24" width="24" height="24" class="inline-block">
                <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"></path>
              </svg>
            </span>
          </div>
          <div class="flex text-black hover:text-blue-500 my-2 mx-3 items-center cursor-pointer dark:text-white dark:hover:text-slate-400">
            <div class="relative">
              <span>Welcome to Unicare Community Health Center!</span>
            </div>
          </div>
        </div>
        <div class="flex-none items-stretch flex h-14 lg:hidden">
          <div class="flex text-black hover:text-blue-500 py-2 px-3 items-center cursor-pointer dark:text-white dark:hover:text-slate-400">
            <span class="inline-flex justify-center items-center w-6 h-6">
              <svg viewBox="0 0 24 24" width="24" height="24" class="inline-block">
                <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z"></path>
              </svg>
            </span>
          </div>
        </div>
        <div class="max-h-screen-menu overflow-y-auto lg:overflow-visible absolute w-screen top-14 left-0 bg-gray-50 shadow-lg lg:w-auto lg:flex lg:static lg:shadow-none dark:bg-slate-800 hidden">
          <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 lg:py-2 lg:px-3">
            <div class="text-sm border-b border-gray-100 lg:border lg:bg-white lg:absolute lg:top-full lg:left-0 lg:min-w-full lg:z-20 lg:rounded-lg lg:shadow-lg lg:dark:bg-slate-800 dark:border-slate-700 lg:hidden">
              <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">
                <div class="flex items-center"><!---->
                  <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                    <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                      <path fill="currentColor" d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"></path>
                    </svg>
                  </span>
                  <span class="px-2 transition-colors">Item One</span>
                </div>
              </div>
              <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">
                <div class="flex items-center"><!---->
                  <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                    <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                      <path fill="currentColor" d="M6.5 20Q4.22 20 2.61 18.43 1 16.85 1 14.58 1 12.63 2.17 11.1 3.35 9.57 5.25 9.15 5.88 6.85 7.75 5.43 9.63 4 12 4 14.93 4 16.96 6.04 19 8.07 19 11 20.73 11.2 21.86 12.5 23 13.78 23 15.5 23 17.38 21.69 18.69 20.38 20 18.5 20Z"></path>
                    </svg>
                  </span>
                  <span class="px-2 transition-colors">Item Two</span>
                </div>
              </div>
              <hr class="hidden lg:block lg:my-0.5 dark:border-slate-700 border-t border-gray-100">
              <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">
                <div class="flex items-center">
                  <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                    <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                      <path fill="currentColor" d="M7,17V1H5V5H1V7H5V17A2,2 0 0,0 7,19H17V23H19V19H23V17M17,15H19V7C19,5.89 18.1,5 17,5H9V7H17V15Z"></path>
                    </svg>
                  </span>
                  <span class="px-2 transition-colors">Item Last</span>
                </div>
              </div>
            </div>
          </div>
          <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 lg:py-2 lg:px-3">
            <div class="text-sm border-b border-gray-100 lg:border lg:bg-white lg:absolute lg:top-full lg:left-0 lg:min-w-full lg:z-20 lg:rounded-lg lg:shadow-lg lg:dark:bg-slate-800 dark:border-slate-700 lg:hidden">
              <a class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">
                <div class="flex items-center">
                  <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                    <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                      <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                    </svg>
                  </span>
                  <span class="px-2 transition-colors">My Profile</span>
                </div>
              </a>
              <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">
                <div class="flex items-center">
                  <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                    <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                      <path fill="currentColor" d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z"></path>
                    </svg>
                  </span>
                  <span class="px-2 transition-colors">Settings</span>
                </div>
              </div>
              <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">
                <div class="flex items-center">
                  <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                    <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                      <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"></path>
                    </svg>
                  </span>
                  <span class="px-2 transition-colors">Messages</span>
                  </div>
                </div>
                <hr class="hidden lg:block lg:my-0.5 dark:border-slate-700 border-t border-gray-100">
                <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">
                  <div class="flex items-center"><!----><span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                    <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                      <path fill="currentColor" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z"></path>
                    </svg>
                  </span>
                  <span class="px-2 transition-colors">Log Out</span>
                </div>
              </div>
            </div>
          </div>
          <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3 lg:w-16 lg:justify-center">
            <div class="flex items-center">
              <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                  <path fill="currentColor" d="M7.5,2C5.71,3.15 4.5,5.18 4.5,7.5C4.5,9.82 5.71,11.85 7.53,13C4.46,13 2,10.54 2,7.5A5.5,5.5 0 0,1 7.5,2M19.07,3.5L20.5,4.93L4.93,20.5L3.5,19.07L19.07,3.5M12.89,5.93L11.41,5L9.97,6L10.39,4.3L9,3.24L10.75,3.12L11.33,1.47L12,3.1L13.73,3.13L12.38,4.26L12.89,5.93M9.59,9.54L8.43,8.81L7.31,9.59L7.65,8.27L6.56,7.44L7.92,7.35L8.37,6.06L8.88,7.33L10.24,7.36L9.19,8.23L9.59,9.54M19,13.5A5.5,5.5 0 0,1 13.5,19C12.28,19 11.15,18.6 10.24,17.93L17.93,10.24C18.6,11.15 19,12.28 19,13.5M14.6,20.08L17.37,18.93L17.13,22.28L14.6,20.08M18.93,17.38L20.08,14.61L22.28,17.15L18.93,17.38M20.08,12.42L18.94,9.64L22.28,9.88L20.08,12.42M9.63,18.93L12.4,20.08L9.87,22.27L9.63,18.93Z"></path>
                </svg>
              </span>
              <span class="px-2 transition-colors lg:hidden">Light/Dark</span>
            </div>
          </div>
          <a class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3 lg:w-16 lg:justify-center" href="https://github.com/justboil/admin-one-vue-tailwind" target="_blank">
            <div class="flex items-center">
              <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                  <path fill="currentColor" d="M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z"></path>
                </svg>
              </span>
              <span class="px-2 transition-colors lg:hidden">GitHub</span>
            </div>
          </a>
          <a class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3 lg:w-16 lg:justify-center" href="https://github.com/justboil/admin-one-react-tailwind" target="_blank">
            <div class="flex items-center">
              <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                  <path fill="currentColor" d="M12,10.11C13.03,10.11 13.87,10.95 13.87,12C13.87,13 13.03,13.85 12,13.85C10.97,13.85 10.13,13 10.13,12C10.13,10.95 10.97,10.11 12,10.11M7.37,20C8,20.38 9.38,19.8 10.97,18.3C10.45,17.71 9.94,17.07 9.46,16.4C8.64,16.32 7.83,16.2 7.06,16.04C6.55,18.18 6.74,19.65 7.37,20M8.08,14.26L7.79,13.75C7.68,14.04 7.57,14.33 7.5,14.61C7.77,14.67 8.07,14.72 8.38,14.77C8.28,14.6 8.18,14.43 8.08,14.26M14.62,13.5L15.43,12L14.62,10.5C14.32,9.97 14,9.5 13.71,9.03C13.17,9 12.6,9 12,9C11.4,9 10.83,9 10.29,9.03C10,9.5 9.68,9.97 9.38,10.5L8.57,12L9.38,13.5C9.68,14.03 10,14.5 10.29,14.97C10.83,15 11.4,15 12,15C12.6,15 13.17,15 13.71,14.97C14,14.5 14.32,14.03 14.62,13.5M12,6.78C11.81,7 11.61,7.23 11.41,7.5C11.61,7.5 11.8,7.5 12,7.5C12.2,7.5 12.39,7.5 12.59,7.5C12.39,7.23 12.19,7 12,6.78M12,17.22C12.19,17 12.39,16.77 12.59,16.5C12.39,16.5 12.2,16.5 12,16.5C11.8,16.5 11.61,16.5 11.41,16.5C11.61,16.77 11.81,17 12,17.22M16.62,4C16,3.62 14.62,4.2 13.03,5.7C13.55,6.29 14.06,6.93 14.54,7.6C15.36,7.68 16.17,7.8 16.94,7.96C17.45,5.82 17.26,4.35 16.62,4M15.92,9.74L16.21,10.25C16.32,9.96 16.43,9.67 16.5,9.39C16.23,9.33 15.93,9.28 15.62,9.23C15.72,9.4 15.82,9.57 15.92,9.74M17.37,2.69C18.84,3.53 19,5.74 18.38,8.32C20.92,9.07 22.75,10.31 22.75,12C22.75,13.69 20.92,14.93 18.38,15.68C19,18.26 18.84,20.47 17.37,21.31C15.91,22.15 13.92,21.19 12,19.36C10.08,21.19 8.09,22.15 6.62,21.31C5.16,20.47 5,18.26 5.62,15.68C3.08,14.93 1.25,13.69 1.25,12C1.25,10.31 3.08,9.07 5.62,8.32C5,5.74 5.16,3.53 6.62,2.69C8.09,1.85 10.08,2.81 12,4.64C13.92,2.81 15.91,1.85 17.37,2.69M17.08,12C17.42,12.75 17.72,13.5 17.97,14.26C20.07,13.63 21.25,12.73 21.25,12C21.25,11.27 20.07,10.37 17.97,9.74C17.72,10.5 17.42,11.25 17.08,12M6.92,12C6.58,11.25 6.28,10.5 6.03,9.74C3.93,10.37 2.75,11.27 2.75,12C2.75,12.73 3.93,13.63 6.03,14.26C6.28,13.5 6.58,12.75 6.92,12M15.92,14.26C15.82,14.43 15.72,14.6 15.62,14.77C15.93,14.72 16.23,14.67 16.5,14.61C16.43,14.33 16.32,14.04 16.21,13.75L15.92,14.26M13.03,18.3C14.62,19.8 16,20.38 16.62,20C17.26,19.65 17.45,18.18 16.94,16.04C16.17,16.2 15.36,16.32 14.54,16.4C14.06,17.07 13.55,17.71 13.03,18.3M8.08,9.74C8.18,9.57 8.28,9.4 8.38,9.23C8.07,9.28 7.77,9.33 7.5,9.39C7.57,9.67 7.68,9.96 7.79,10.25L8.08,9.74M10.97,5.7C9.38,4.2 8,3.62 7.37,4C6.74,4.35 6.55,5.82 7.06,7.96C7.83,7.8 8.64,7.68 9.46,7.6C9.94,6.93 10.45,6.29 10.97,5.7Z"></path>
                </svg>
              </span>
              <span class="px-2 transition-colors lg:hidden">React version</span>
            </div>
          </a>
          <div class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3 lg:w-16 lg:justify-center">
            <div class="flex items-center">
              <span class="inline-flex justify-center items-center w-6 h-6 transition-colors">
                <svg viewBox="0 0 24 24" width="16" height="16" class="inline-block">
                  <path fill="currentColor" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z"></path>
                </svg>
              </span>
              <span class="px-2 transition-colors lg:hidden">Log out</span>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <aside id="aside" :class="menu ? 'lg:py-2 lg:pl-2 w-60 fixed flex z-40 top-0 h-screen transition-position overflow-hidden -left-60 lg:left-0 lg:hidden xl:flex': 'lg:py-2 lg:pl-2 w-60 fixed flex z-40 top-0 h-screen transition-position overflow-hidden left-0 lg:hidden xl:flex'">
      <div class="bg-gray-800 lg:rounded-2xl flex-1 flex flex-col overflow-hidden dark:bg-slate-900">
        <div class="bg-gray-900 text-white flex flex-row h-14 items-center justify-between dark:bg-slate-900">
          <div class="text-center flex-1 lg:text-left lg:pl-6 xl:text-center xl:pl-0">
            <b class="font-black">One</b>
          </div>
        </div>
        <div class="aside-scrollbars-gray flex-1 overflow-y-auto overflow-x-hidden">
          <ul class="pl-5">
            <li v-for="item in navigation" class="flex">
                <img :src="url + item.logo" alt="" class="inline-flex justify-center items-center h-4 w-4 mt-4">
                <router-link
                    :key="item.name"
                    :to="item.to"
                    :class="[
                    this.$route.name === item.to.name
                      ? 'flex cursor-pointer py-3 hover:text-white dark:text-slate-300 dark:hover:text-white font-bold text-white ml-5'
                      : 'flex cursor-pointer py-3 text-gray-300 hover:text-white dark:text-slate-300 dark:hover:text-white ml-5',
                    ]" exact
                    >{{ item.name }}
                </router-link>
            </li>
          </ul>    
        </div>
      </div> 
    </aside>
    <section class="p-6 xl:max-w-10xl xl:mx-auto">
      <router-view></router-view>
    </section>
  </div>
  </div>  
</template>
<script>
  import  store  from "../store";
  import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
  import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
  import { useStore } from 'vuex'
  import { computed } from 'vue'
  import { useRouter, useRoute } from "vue-router"
  
const url = window.location.origin + "/src/assets/image/";

  const navigation = [
    { name: 'Announcement', to: { name: 'Announcement' }, logo: "megaphone.png" },
    { name: 'Vaccine', to: { name: 'Vaccine' }, logo: "vaccine (3).png" }, 
    { name: 'Vaccinee', to: { name: 'Vaccinee' }, logo: "vaccinated.png"},
    { name: 'Barangay', to: {name: 'Barangay' }, logo: "crowd-of-users.png"},
    {name: 'Vaccine Registration', to: {name: 'VaccineRegistration'}, logo: "verify.png"},
    {name: 'Reports', to: {name: 'Reports'}, logo: "verify.png"}
  ];


  const test = setTimeout(myGreeting, 5000);

function myGreeting() {
  var dateObj = new Date();
  var month = ("0" + (dateObj.getMonth() + 1)).slice(-2);
  var date = ("0" + dateObj.getDate()).slice(-2);
  var year = dateObj.getUTCFullYear();

  var newdate = year + "-" + month + "-" + date;

  store.dispatch("message", newdate).then(() => {
        // router.push({
        //     name: "Announcement",
        // })
  })
}

  
  export default{
    data() {
      return {
        menu: false
      }
    },
    components: {
      Disclosure,
      DisclosureButton,
      DisclosurePanel,
      Menu,
      MenuButton,
      MenuItem,
      MenuItems,
      Bars3Icon,
      BellIcon,
      XMarkIcon,
  
    },
    setup() {

      return {
        navigation,
        url,
        myGreeting
        
      }
    }
  }
  </script>

<style>
.transition-position {
  transition-property: right,left,top,bottom,margin,padding;
    transition-timing-function: cubic-bezier(.4,0,.2,1);
    transition-duration: .15s;
}
</style>


