<div class="values-layout text-center mt-4">
    <div class="row">
        <div class="col">
            <div class="value-card bg-success text-white">
                <h3>{{ number_format($totalArketim ?? 0, 2) }} €</h3>
            </div>
        </div>
        <div class="col">
            <div class="value-card bg-warning text-white">
                <h3>{{ number_format($totalShpenzim ?? 0, 2) }} €</h3>
            </div>
        </div>
        <div class="col">
            <div class="value-card bg-info text-white">
                <h3>{{ number_format(($totalArketim ?? 0) - ($totalShpenzim ?? 0), 2) }} €</h3>
            </div>
        </div>
    </div>
</div>