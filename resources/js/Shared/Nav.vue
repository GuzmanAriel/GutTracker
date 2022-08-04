<template>
    <nav class="ml-6">
        <ul class="flex space-x-4 list-inside text-secondary">
            <li>
                <NavLink href="/" :active="$page.component === 'Home'">
                    Home
                </NavLink>
            </li>

            <li>
                <NavLink href="/calendar" :active="$page.component === 'Calendar'">
                    Calendar
                </NavLink>
            </li>

            <li>
                <NavLink href="/logout" method="post">
                    Logout
                </NavLink>
            </li>

        </ul>
    </nav>
</template>

<script>
import NavLink from "./NavLink";

export default {
    components: { NavLink },
};
</script>
