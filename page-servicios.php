<?php
/**
 * Template Name: Servicios
 */

get_header();
?>
<main>
    <!-- Hero Section -->
    <section class="relative h-screen w-full flex items-center justify-start overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover filter brightness-[0.4] grayscale-[0.2]" data-alt="Cinematic wide shot of a pristine, high-end Porsche service bay with surgical lighting and a dark, moody atmosphere." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAq9DaB8yos3p6_hpoHmoRkZPZ9YCXtao4j2vdAM2vE6Rn4V9wOj__qoNWoz3zW_ENs6fmTJf3giKhXjrXQFEnUmTFJSLwOCXC74DQT4dCfta4ho5SAp7u04VMtWKGSXMYAICnqbF61HyH05NSuAKu9cKwvb5CKXVJUvahBcOXJdbA_jdROZKM_ypaBymYsPj46Bx-NFlzVpJpV_muWT7RtRkbdwGFCWFOhyEb_6h09chowo5j4aL_C35qMrohoJA8yy5cgojlSDSA"/>
            <div class="absolute inset-0 bg-gradient-to-r from-black via-black/40 to-transparent"></div>
        </div>
        <div class="relative z-10 px-8 md:px-24 max-w-5xl">
            <span class="block text-secondary font-label text-xs tracking-[0.4em] uppercase mb-6">Precision Engineering</span>
            <h1 class="text-6xl md:text-8xl font-headline font-bold text-on-surface leading-[0.9] tracking-tighter mb-8">
                Service <br/>Excellence
            </h1>
            <p class="text-on-surface-variant text-lg max-w-xl mb-12 leading-relaxed">
                Beyond maintenance. Our technicians treat every Porsche as a masterpiece of engineering, ensuring the soul of your vehicle remains untouched by time.
            </p>
            <div class="flex gap-6">
                <button class="bg-secondary text-surface-dim px-10 py-5 font-label text-xs font-bold tracking-widest uppercase hover:scale-[1.02] transition-transform duration-300">
                    Book Appointment
                </button>
            </div>
        </div>
        <div class="absolute bottom-12 left-8 md:left-24 flex items-center gap-4">
            <div class="h-[1px] w-24 bg-outline-variant/40">
                <div class="h-full bg-secondary w-1/3"></div>
            </div>
            <span class="text-[10px] uppercase tracking-widest text-on-surface-variant font-medium">01 / 04</span>
        </div>
    </section>

    <!-- Main Services Bento Grid -->
    <section class="py-32 px-8 md:px-24 bg-surface-dim">
        <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">
            <div class="max-w-2xl">
                <h2 class="text-4xl md:text-5xl font-headline font-bold text-on-surface tracking-tight mb-6">Comprehensive Care</h2>
                <p class="text-on-surface-variant leading-relaxed">Tailored solutions for every era of Porsche performance. From the first oil change to a full historical restoration.</p>
            </div>
            <div class="text-secondary font-label text-xs tracking-[0.2em] border-b border-secondary pb-2 cursor-pointer hover:text-on-surface transition-colors">
                VIEW ALL SERVICES
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- Service & Maintenance -->
            <div class="md:col-span-8 group relative aspect-video md:aspect-auto md:h-[600px] overflow-hidden bg-surface-container">
                <img class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-700" data-alt="Detailed close-up of a Porsche flat-six engine being serviced by a technician in white gloves." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDhqfdB6WYYPWe9JnDlMFqkLXwex1LV4IbBf4HHmzBazVeSgP_BXvi3hk88bSJtU-Xi-u258jQzPKOqoCv2HKvGMNULaTaI8RVmc30bDjbSAQHrBgE0PuvQbzjOslqVmJgB07yD0Z7jjgdav6PizyVHg6ro5ggOz4bfzeCy9Z8Q8t3eBhskphZnV_z8Od7oDSg6_fGsxNn-Ey0WXlpxizw4BjN3WLRt5enIdgEZ-LxilKJ6kT2SJr7OG_tFFtgP-Hx21JbEh_mBsso"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-12">
                    <span class="text-xs text-secondary font-label tracking-[0.3em] mb-4 block">ESSENTIAL</span>
                    <h3 class="text-3xl font-headline font-bold text-on-surface mb-4">Service &amp; Maintenance</h3>
                    <p class="text-on-surface-variant max-w-sm mb-6">Routine excellence following strict factory protocols to preserve peak performance.</p>
                    <button class="flex items-center gap-3 text-on-surface hover:text-secondary transition-colors group/btn">
                        <span class="text-xs font-label tracking-widest uppercase">Explore Care</span>
                        <span class="material-symbols-outlined text-sm group-hover/btn:translate-x-2 transition-transform" data-icon="arrow_forward">arrow_forward</span>
                    </button>
                </div>
            </div>
            <!-- Original Parts -->
            <div class="md:col-span-4 group relative min-h-[400px] overflow-hidden bg-surface-container-high">
                <img class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-105 transition-transform duration-700" data-alt="High-precision metal Porsche car part resting on a dark, reflective surface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_RxUcGWdMrkwJQZ9YZHoawmbxZACSinXoVRsu-LSsI-uFV1B5x86Tf9fa3eJBhLdGb7jDRMaCrbznisH6lQD6andn1_lfddA1DVLIqU_iiZ8JAhyVv74gWgeQlqoXt7zuVg9IAJZXiB0DOfb9YArzL_iHs5KrKo-dWlynoNT4rH9EOxFQQMNgNx-rrLehNBGM-U0V1duh3LV6be8PowZZTiWLMDy2OiNthRSk-Zd18ckeFm8YOYiOalFQUdIFTsLPi3H_oUOr_Fs"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-10">
                    <span class="text-xs text-secondary font-label tracking-[0.3em] mb-4 block">GENUINE</span>
                    <h3 class="text-2xl font-headline font-bold text-on-surface mb-4">Original Parts</h3>
                    <p class="text-on-surface-variant text-sm mb-6">Every component is a testament to our engineering heritage.</p>
                </div>
            </div>
            <!-- Exclusive Manufaktur -->
            <div class="md:col-span-4 group relative min-h-[400px] overflow-hidden bg-surface-container-high">
                <img class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-105 transition-transform duration-700" data-alt="Luxurious interior of a Porsche with bespoke leather stitching and gold accents." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAfBMf3GQWO5xPHC5olzAhhmkmK3Hr-89wjwDkyz3x5QxSGfjnbfuYPI9ixFvvWNlhVexjln89EXWVpfiJ-OYQZFs-O8SzAltb7d6EamfXIIpxzyET5ovfWKQe4QT3mptrTzaKtVMWnyn9eJ-Zewf3CV0MgBaqWsC3sa2k_BvJciR0yqh4CoQGoPxcXmA6ZwYzZ5WWvzW8YsOfXL_2Ndb4XkMYLWgqkaCZP0HFGByN_JVWiKtrMhNFE9RkgG9VDHoiYXLLVbBnhEf4"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-10">
                    <span class="text-xs text-secondary font-label tracking-[0.3em] mb-4 block">BESPOKE</span>
                    <h3 class="text-2xl font-headline font-bold text-on-surface mb-4">Exclusive Manufaktur</h3>
                    <p class="text-on-surface-variant text-sm mb-6">Personalize your legacy with high-end craftsmanship.</p>
                </div>
            </div>
            <!-- Porsche Classic -->
            <div class="md:col-span-8 group relative min-h-[400px] overflow-hidden bg-surface-container">
                <img class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-700" data-alt="Vintage classic silver Porsche 911 being detailed in a brightly lit studio." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC6xJRqeipu8VqZmIerWIVgVzCAfSk12XMFlOyYrwGaXG65MWHGPa3tkq0Cwqv2slQ8NDjYlJJdumwDg54cBu2uimV9T2ep8Xdrn2FtuFJ1UwPCSqABdcwmh6w1FXrHQPMbWUAD1Lsi_fhYnsIbc2fxZe8IDr-tGCfIJx7ZpYXLoN1BNN6jlLsSVi7WYH5JrrIFOZi3JgoFmlGZbVDSSZcGca6dQt-LyLL45WdLyj2zmzIO5oHNbawb7-iGIAjmgDxpdcFofdFuZE0"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-12">
                    <span class="text-xs text-secondary font-label tracking-[0.3em] mb-4 block icon">HERITAGE</span>
                    <h3 class="text-3xl font-headline font-bold text-on-surface mb-4">Porsche Classic</h3>
                    <p class="text-on-surface-variant max-w-sm mb-6">Specialized care for the icons that defined our history.</p>
                    <button class="flex items-center gap-3 text-on-surface hover:text-secondary transition-colors group/btn">
                        <span class="text-xs font-label tracking-widest uppercase">Restore a Legend</span>
                        <span class="material-symbols-outlined text-sm group-hover/btn:translate-x-2 transition-transform" data-icon="auto_awesome">auto_awesome</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Features & CTA -->
    <section class="py-32 px-8 md:px-24 bg-surface-container-low">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-headline font-bold text-on-surface tracking-tight mb-8">Digital Workshop</h2>
                <div class="space-y-12">
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-surface-container-high border border-outline-variant/30">
                            <span class="material-symbols-outlined text-secondary" data-icon="calendar_month">calendar_month</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-headline font-bold text-on-surface mb-2">Service Appointments</h4>
                            <p class="text-on-surface-variant text-sm leading-relaxed">Book your technical inspection online with real-time availability at your preferred Porsche Center.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-surface-container-high border border-outline-variant/30">
                            <span class="material-symbols-outlined text-secondary" data-icon="build">build</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-headline font-bold text-on-surface mb-2">Technical Check-up</h4>
                            <p class="text-on-surface-variant text-sm leading-relaxed">A comprehensive 111-point inspection designed to reveal the status of every critical component.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-surface-container-high border border-outline-variant/30">
                            <span class="material-symbols-outlined text-secondary" data-icon="shield">shield</span>
                        </div>
                        <div>
                            <h4 class="text-lg font-headline font-bold text-on-surface mb-2">Warranty Extensions</h4>
                            <p class="text-on-surface-variant text-sm leading-relaxed">Ensure peace of mind with the Porsche Approved Warranty, covering up to 15 years of vehicle life.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-surface-dim p-12 border border-outline-variant/20 relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-secondary/5 blur-[100px]"></div>
                <h3 class="text-2xl font-headline font-bold text-on-surface mb-6">Ready for your next journey?</h3>
                <p class="text-on-surface-variant mb-10 text-sm leading-relaxed">Select your nearest service center and schedule your visit. Our experts are standing by to provide the precision your vehicle deserves.</p>
                <form class="space-y-8">
                    <div class="relative">
                        <label class="block text-[10px] uppercase tracking-[0.2em] text-on-surface-variant font-bold mb-2">Select Center</label>
                        <select class="w-full bg-transparent border-b border-outline-variant py-3 text-on-surface focus:outline-none focus:border-secondary transition-colors appearance-none cursor-pointer">
                            <option>Centro Porsche Madrid Norte</option>
                            <option>Centro Porsche Barcelona</option>
                            <option>Centro Porsche Marbella</option>
                        </select>
                    </div>
                    <button class="w-full bg-secondary text-surface-dim py-5 font-label text-xs font-bold tracking-widest uppercase hover:opacity-90 transition-opacity" type="button">
                        Request Availability
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Alquiler de Vehículos (Porsche Rentals Plugin) -->
    <section class="py-32 px-8 md:px-24 bg-surface-dim">
        <div class="max-w-2xl mb-16">
            <h2 class="text-4xl md:text-5xl font-headline font-bold text-on-surface tracking-tight mb-6">Flota de Alquiler</h2>
            <p class="text-on-surface-variant leading-relaxed">Experimenta la emoción de conducir un Porsche. Elige tu modelo y reserva tus fechas directamente desde nuestro catálogo exclusivo.</p>
        </div>
        <?php echo do_shortcode('[catalogo_porsches]'); ?>
    </section>


    <!-- Map Section (Stylized) -->
    <section class="h-[500px] w-full bg-surface-container relative">
        <div class="absolute inset-0 grayscale opacity-40">
            <!-- Simulated Map Visual -->
            <div class="w-full h-full bg-[#131313]" data-location="Madrid, Spain" style="">
                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 50% 50%, #2a2a2a 1px, transparent 1px); background-size: 30px 30px;"></div>
            </div>
        </div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="bg-surface-dim/90 backdrop-blur-xl p-8 border border-outline-variant/30 text-center max-w-sm">
                <span class="material-symbols-outlined text-secondary text-4xl mb-4" data-icon="location_on">location_on</span>
                <h3 class="text-xl font-headline font-bold text-on-surface mb-2">Dealer Locator</h3>
                <p class="text-on-surface-variant text-xs mb-6 uppercase tracking-widest">Find your nearest Porsche Partner in Spain</p>
                <button class="border border-secondary text-secondary px-8 py-3 text-[10px] font-bold tracking-widest uppercase hover:bg-secondary hover:text-surface-dim transition-all">
                    Search Now
                </button>
            </div>
        </div>
    </section>
</main>
<?php
get_footer('servicios');
