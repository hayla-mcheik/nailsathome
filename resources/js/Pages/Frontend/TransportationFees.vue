<template>
      <GuestLayout>

    <section class="transportation-wrap py-12 bg-[#faefed] text-dark">
        <div class="container-fluid px-4 lg:px-12">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="sticky-top" style="top: 100px;">
                        <h2 class="script-font text-dark mb-0">Transportation</h2>
                        <h3 class="heading-font text-dark mb-4">Network & Charges</h3>
                        
                        <p class="text-sm opacity-90 leading-relaxed mb-6">
                            The map indicates the main transportation areas covered by Nails At Home and the 
                            charges for each area. If your area is not indicated in the map, please request a 
                            transportation quote when placing your appointment.
                        </p>

                        <p class="mt-4 italic text-xs opacity-70">
                            Please contact our guest service desk for more information.
                        </p>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="bg-[#faefed] text-[#8c6a56] rounded-xl p-6 lg:p-10 shadow-xl">
                        <div class="row">
                            <div v-for="colIndex in 3" :key="colIndex" class="col-md-4 mb-4">
                                <div v-for="(item, index) in getChunk(colIndex)" :key="item.id" class="fee-item">
                                    <span class="index">{{ calculateIndex(colIndex, index) }}</span>
                                    <span class="area-name">{{ item.name }}</span>
                                    <span class="fee-amount">{{ item.fee ? item.fee.fee : '0' }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8 pt-4 border-top border-[#8c6a56]/10 text-center text-[10px] italic opacity-60">
                            (All prices are in UAE dirham / VAT not included)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            
      </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    transportation: Array // This is TransportationArea::with('fee')->get()
});

// Logic to split the 54 items into 3 columns
const itemsPerCol = 18;

const getChunk = (colIndex) => {
    const start = (colIndex - 1) * itemsPerCol;
    const end = colIndex * itemsPerCol;
    return props.transportation.slice(start, end);
};

const calculateIndex = (colIndex, index) => {
    return (colIndex - 1) * itemsPerCol + index + 1;
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display:wght@700&display=swap');

.script-font {
    font-size: 2rem;
}

.heading-font {
    font-size: 2rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.brochure-filter {
    /* Adjusts a standard map image to look like the brown/sepia brochure style */
    filter: sepia(0.4) hue-rotate(-20deg) contrast(1.1) brightness(0.9);
}

.fee-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 6px 0;
    font-size: 11px;
    border-bottom: 1px solid rgba(140, 106, 86, 0.1);
}

.fee-item .index {
    width: 20px;
    opacity: 0.5;
    font-weight: bold;
}

.fee-item .area-name {
    flex: 1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding-right: 5px;
}

.fee-item .fee-amount {
    font-weight: 700;
}

@media (max-width: 991px) {
    .script-font { font-size: 2.5rem; }
    .heading-font { font-size: 1.8rem; }
}
</style>