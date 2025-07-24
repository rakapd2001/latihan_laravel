<template>
    <Disclosure as="nav" class="bg-gray-0 dark:bg-gray-800" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="size-8"
                            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                            alt="UAS WEB2" />
                    </div>

                </div>
                <div class="hidden md:block">
                    <!-- Bagian untuk pengguna yang sudah login -->
                    <div v-if="isLoggedIn" class=" ml-4 flex items-center md:ml-6">
                        <button type="button"
                            class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                            <span class="absolute -inset-1.5" />
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="size-6" aria-hidden="true" />
                        </button>
                        <!-- Profile dropdown -->
                        <Menu as="div" class="relative ml-3">
                            <div>
                                <MenuButton
                                    class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800">
                                    <span class="absolute -inset-1.5" />
                                    <span class="sr-only">Open user menu</span>
                                    <UserCircleIcon class="w-10 h-10 text-gray-500 dark:" />
                                </MenuButton>
                            </div>
                            <transition enter-active-class="transition ease-out duration-100"
                                 enter-from-class="transform opacity-0 scale-95"
                                 enter-to-class="transform opacity-100 scale-100"
                                 leave-active-class="transition ease-in duration-75"
                                 leave-from-class="transform opacity-100 scale-100"
                                 leave-to-class="transform opacity-0 scale-95">
                                <MenuItems
                                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden">
                                    <MenuItem v-for="item in userNavigation" :key="item.name">
                                        <a v-if="item.action !== 'logout'" :href="item.href"
                                            :target="item.external ? '_blank' : null"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            {{ item.name }}
                                        </a>
                                        <button v-else @click="logout"
                                            class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            {{ item.name }}
                                        </button>
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                        <ThemeToggle />
                    </div>
                    <!-- Bagian untuk pengguna yang belum login (guest) -->
                    <div v-else class="flex items-center ml-6 space-x-4">
                        <a href="/login" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Login
                        </a>
                        <a href="/register" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Register
                        </a>
                        <ThemeToggle />
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <DisclosureButton
                        class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                        <span class="absolute -inset-0.5" />
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon v-if="!open" class="block size-6" aria-hidden="true" />
                        <XMarkIcon v-else class="block size-6" aria-hidden="true" />
                    </DisclosureButton>
                </div>
            </div>


        </div>

        <DisclosurePanel class="md:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <router-link v-for="item in navigation" :key="item.name" :to="item.to"
                    v-slot="{ href, navigate, isActive }">
                    <DisclosureButton as="a" :href="href" @click="navigate"
                        :class="[isActive ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                            'block rounded-md px-3 py-2 text-base font-medium'
                        ]"
                        :aria-current="isActive ? 'page' : undefined">{{ item . name }}</DisclosureButton>
                </router-link>
            </div>
            <div class="border-t border-gray-700 pt-4 pb-3" v-if="isLoggedIn">
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <UserCircleIcon class="w-1 h-1" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">{{ user . name }}</div>
                        <div class="text-sm font-medium text-gray-400">{{ user . email }}</div>
                    </div>
                    <button type="button"
                        class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                        <span class="absolute -inset-1.5" />
                        <span class="sr-only">View notifications</span>
                        <BellIcon class="size-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <template v-for="item in userNavigation" :key="item.name">
                        <DisclosureButton v-if="item.action !== 'logout'" as="a" :href="item.href"
                            :target="item.external ? '_blank' : null"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                            {{ item.name }}
                        </DisclosureButton>
                        <DisclosureButton v-else as="button" @click="logout"
                            class="w-full text-left block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                            {{ item.name }}
                        </DisclosureButton>
                    </template>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-4 pb-3" v-else>
                <div class="px-5 flex gap-3">
                    <a href="/login" class="text-sm font-medium text-black hover:underline dark:text-white dark:hover:underline">Login</a>
                    <a href="/register" class="text-sm font-medium text-white hover:underline">Register</a>
                </div>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>

<script setup>
import { UserCircleIcon } from '@heroicons/vue/24/solid'
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import ThemeToggle from './ThemeToggle.vue'
import axios from 'axios'
    import {
        ref
    } from 'vue'

    // Ambil URL dari window global
    const exportPdfUrl = window.appData?.exportPdfUrl ?? '#'
    const logout = async () => {
        try {
            await axios.post('/logout'); // pastikan route POST logout tersedia
            window.location.href = '/'; // redirect ke halaman login
        } catch (error) {
            console.error('Logout failed:', error);
        }
    }
    const user = window.appData?.user;
    const isLoggedIn = ref(!!user);

    const navigation = [{
        name: 'Posts',
        to: {
            name: 'posts.index'
        }
    }, ]

    const userNavigation = [
        { name: 'Your Profile', href: '#' },
        { name: 'Settings', href: '#' },
        { name: 'Export Pdf ', href: exportPdfUrl, external: true },
        { name: 'Sign out', href: '', action: 'logout' }
    ];
    

</script>
