/**
 * Peru Locations Helper
 * 
 * Handles cascading selects for Department, Province and District.
 * Expects a global object `comsatelUbicaciones` containing the data.
 */

class PeruUbicaciones {
    constructor(selectors) {
        this.deptSelect = document.querySelector(selectors.departamento);
        this.provSelect = document.querySelector(selectors.provincia);
        this.distSelect = document.querySelector(selectors.distrito);

        if (!this.deptSelect || !this.provSelect || !this.distSelect) {
            console.warn('PeruUbicaciones: One or more selectors not found.');
            return;
        }

        this.data = window.comsatelUbicaciones || {};
        this.init();
    }

    init() {
        this.populateDepartments();

        this.deptSelect.addEventListener('change', () => {
            this.populateProvinces(this.deptSelect.value);
            this.clearSelect(this.distSelect);
        });

        this.provSelect.addEventListener('change', () => {
            this.populateDistricts(this.deptSelect.value, this.provSelect.value);
        });
    }

    populateDepartments() {
        this.clearSelect(this.deptSelect);
        Object.keys(this.data).sort().forEach(dept => {
            const option = document.createElement('option');
            option.value = dept;
            option.textContent = dept;
            this.deptSelect.appendChild(option);
        });
    }

    populateProvinces(deptName) {
        this.clearSelect(this.provSelect);
        this.clearSelect(this.distSelect);

        if (!deptName || !this.data[deptName]) return;

        Object.keys(this.data[deptName]).sort().forEach(prov => {
            const option = document.createElement('option');
            option.value = prov;
            option.textContent = prov;
            this.provSelect.appendChild(option);
        });
    }

    populateDistricts(deptName, provName) {
        this.clearSelect(this.distSelect);

        if (!deptName || !provName || !this.data[deptName][provName]) return;

        this.data[deptName][provName].sort().forEach(dist => {
            const option = document.createElement('option');
            option.value = dist;
            option.textContent = dist;
            this.distSelect.appendChild(option);
        });
    }

    clearSelect(selectElement) {
        // Keep only the first option (usually "Selecciona")
        const firstOption = selectElement.querySelector('option[value=""]');
        selectElement.innerHTML = '';
        if (firstOption) {
            selectElement.appendChild(firstOption);
        } else {
            const defaultOpt = document.createElement('option');
            defaultOpt.value = '';
            defaultOpt.textContent = 'Selecciona';
            selectElement.appendChild(defaultOpt);
        }
    }
}

// Export for global use
window.PeruUbicaciones = PeruUbicaciones;
