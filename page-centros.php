<?php
/**
 * Template Name: Centros Porsche
 */

get_header();
?>
<main>
    <!-- Hero Section -->
    <section class="relative h-screen w-full flex items-end overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover" data-alt="Cinematic night view of a sleek glass Porsche dealership with warm interior lighting and a dark silhouette of a Taycan in the foreground" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDORRcLtXpXrr7J01T-cZldmiQ0_W9S4ahvzmdDwoxUcMss0qKqw5xaOvXsePbsr3SXoTYwONmm8ehfdujwZKqYidoxhVYlLobBD8LbiTBHEQ9_PURpO1BuF0tqiRY99sukVKN_U2cieot_ZwpIV-beY1lyt_n6obVJb2wANjUugl0S1_l71Fnl_Rxzco-7JctWPNtatAuaWJvnp497zfMRIWURuiZveI91iWLnn7do3gje-dXwIcuc897D3aL1NRDPA9F5gs3Jh8"/>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent opacity-80"></div>
        </div>
        <div class="relative z-10 px-8 pb-24 md:px-24 max-w-5xl">
            <span class="text-label-md text-secondary mb-4 block">Official Porsche Network</span>
            <h1 class="text-display-lg mb-8">Porsche Centres.<br/>Excellence in every detail.</h1>
            <div class="flex space-x-4">
                <a class="bg-secondary text-on-secondary px-8 py-4 text-label-md font-bold hover:scale-105 transition-transform duration-300" href="#booking">Book Appointment</a>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="bg-surface-container py-24 px-8 md:px-24">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-headline-md mb-12 text-center">Find your nearest Porsche Centre</h2>
            <div class="relative flex items-center group">
                <span class="absolute left-4 text-on-surface-variant material-symbols-outlined">location_on</span>
                <input class="w-full bg-transparent border-b-2 border-outline py-6 pl-14 text-on-surface focus:outline-none focus:border-secondary transition-colors duration-300 text-title-sm placeholder:text-on-surface-variant/40" placeholder="ENTER CITY, POSTCODE OR COUNTRY" type="text"/>
                <button class="absolute right-0 text-secondary hover:translate-x-2 transition-transform duration-300">
                    <span class="material-symbols-outlined" style="font-size: 32px;">arrow_forward</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Services Grid (Bento Style Asymmetry) -->
    <section class="bg-surface-dim py-32 px-8 md:px-24">
        <div class="mb-20">
            <h3 class="text-label-md text-secondary mb-2">Our Services</h3>
            <h2 class="text-display-lg max-w-2xl">Precision Beyond the Drive</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            <!-- Large Feature -->
            <div class="md:col-span-7 bg-surface-container-high relative group overflow-hidden">
                <div class="aspect-[16/10] overflow-hidden">
                    <img class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700 scale-105 group-hover:scale-100" data-alt="A clean workshop bay with a Porsche 911 on a hydraulic lift and a technician in Porsche uniform inspecting the undercarriage" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUPHx-ZIS7Ct8ZXTk2tXsp0zOKbXFnsmmfccUhmolFm33xiYUtmtUa1E7gpQ_3bNIEUXmamawiXs03wY6FcfPeDM9g90mXVDz1kyeCw65LeUArLiI-i_HDMX5qppgPr0oPMfLuxIYMTl1uNJUYAhpld3D2BlG9GDXPVVE786yzM7Jv4RRCUpBO_Txv73hWZuRPz9UvsLra7gg0wyZUX4nM186J2irQ4oG2QNqYPmZHuXhswuVgXaZvFrjo2CEN0JjypjhKwrkrUmE"/>
                </div>
                <div class="p-12">
                    <h4 class="text-headline-md mb-4">Service &amp; Maintenance</h4>
                    <p class="text-on-surface-variant mb-8 max-w-md leading-relaxed">Entrust your vehicle to those who know it best. Our certified technicians use only Genuine Porsche Parts to ensure peak performance.</p>
                    <a class="text-label-md text-secondary flex items-center group/link" href="#">
                        Explore Services 
                        <span class="material-symbols-outlined ml-2 group-hover/link:translate-x-2 transition-transform">east</span>
                    </a>
                </div>
            </div>

            <!-- Secondary Features Stack -->
            <div class="md:col-span-5 flex flex-col gap-12">
                <div class="bg-surface-container-high group">
                    <div class="aspect-video overflow-hidden">
                        <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" data-alt="Luxury showroom interior focusing on personalization samples like leather swatches and paint colors in a Porsche Exclusive Manufaktur lounge" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzcV7gDVw0OKAmOyOT-4nPcYDasTP-oTC0h7-6Gcc8eoeeqnBLYZcsrL2uZAmQuju4eswwvJHkPgjP9VOhWw-bHlE50gLdH5xaoHWSJq6CTOGQAGQmLBHNykPvWfyGOplIN6EzrH-7LTTVhaBvX0AnK53mfTx_vBZZMPHJ9mtFQE64biTR8ve4HMA4MXmWRk4Z7asQLtCQ3Q8Bl2LfPcV1MGEoYPkkkJszyKgBJ-N3hXWYZUvPvxmLF527Y8hhlIpEgbNJ0ZPChAU"/>
                    </div>
                    <div class="p-8">
                        <h4 class="text-headline-md mb-2">Exclusive Manufaktur</h4>
                        <p class="text-label-md text-on-surface-variant mb-6">Bespoke Personalization</p>
                    </div>
                </div>
                <div class="bg-surface-container-high group">
                    <div class="aspect-video overflow-hidden">
                        <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" data-alt="Close up of a classic silver air-cooled Porsche 911 steering wheel and dashboard with analog gauges in soft afternoon light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD_eZPaFektmA1IgL1-RupxBc8e6oMGfQfppb_Lg1kdvxrDuwRiRCW73qbRQusYC96_DB4L4nTZ0koDcHcRP0Ke45WOpK400Cc22GaVrOK1WT72mwmtrCkFwxvTGa3_F7T0inoFGpoeEShszztLFmMc6xcGeC-qKRBiJwJObarQRPmp4hUCTkpZFr1vln9TMTGli64If3slxKNhQ6Bs6P1cXSkasOlu6yKjxJIkzwUmc4Z_ziQOyN9RUGXpzXytqN5bCbqNetfOG2U"/>
                    </div>
                    <div class="p-8">
                        <h4 class="text-headline-md mb-2">Porsche Classic</h4>
                        <p class="text-label-md text-on-surface-variant mb-6">Preserving Legends</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section class="bg-surface-container py-32 px-8 md:px-24" id="booking">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-24">
            <div class="md:w-1/2">
                <h2 class="text-display-lg mb-8">Personal Assistance.</h2>
                <p class="text-on-surface-variant text-lg leading-relaxed mb-12">Whether you are looking for a new model, an approved pre-owned vehicle, or require expert servicing, our consultants are ready to assist you in the pursuit of perfection.</p>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <span class="material-symbols-outlined text-secondary">verified</span>
                        <div>
                            <h5 class="text-title-sm">Direct Consultation</h5>
                            <p class="text-on-surface-variant text-sm">Face-to-face expertise at your nearest centre.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <span class="material-symbols-outlined text-secondary">schedule</span>
                        <div>
                            <h5 class="text-title-sm">Flexible Scheduling</h5>
                            <p class="text-on-surface-variant text-sm">Appointments tailored to your calendar.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 bg-surface-container-high p-12">
                <h3 class="text-headline-md mb-12">Enquiry Form</h3>
                <form class="space-y-10">
                    <div class="relative">
                        <label class="text-label-md absolute -top-6 left-0 text-on-surface-variant">FULL NAME</label>
                        <input class="w-full bg-transparent border-b border-outline py-4 text-on-surface focus:outline-none focus:border-secondary transition-all" type="text"/>
                    </div>
                    <div class="relative">
                        <label class="text-label-md absolute -top-6 left-0 text-on-surface-variant">EMAIL ADDRESS</label>
                        <input class="w-full bg-transparent border-b border-outline py-4 text-on-surface focus:outline-none focus:border-secondary transition-all" type="email"/>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                        <div class="relative">
                            <label class="text-label-md absolute -top-6 left-0 text-on-surface-variant">INTEREST</label>
                            <select class="w-full bg-transparent border-b border-outline py-4 text-on-surface focus:outline-none focus:border-secondary appearance-none rounded-none">
                                <option class="bg-surface-container-high">Test Drive</option>
                                <option class="bg-surface-container-high">Service Appointment</option>
                                <option class="bg-surface-container-high">Sales Inquiry</option>
                            </select>
                        </div>
                        <div class="relative">
                            <label class="text-label-md absolute -top-6 left-0 text-on-surface-variant">MODEL</label>
                            <select class="w-full bg-transparent border-b border-outline py-4 text-on-surface focus:outline-none focus:border-secondary appearance-none rounded-none">
                                <option class="bg-surface-container-high">911</option>
                                <option class="bg-surface-container-high">Taycan</option>
                                <option class="bg-surface-container-high">Cayenne</option>
                                <option class="bg-surface-container-high">Panamera</option>
                            </select>
                        </div>
                    </div>
                    <div class="pt-8">
                        <button class="w-full bg-secondary text-on-secondary py-5 text-label-md font-bold tracking-widest hover:bg-white hover:text-black transition-all duration-300" type="submit">SEND ENQUIRY</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php
get_footer('centros');
