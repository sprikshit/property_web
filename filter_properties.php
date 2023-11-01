<!DOCTYPE html>
<html>
<head>
    <title>Property Search</title>
</head>
<body>
    <form id="property-search-form" method="GET">
        <label for="property-type">Property Type:</label>
        <select id="property-type" name="type">
            <option value="Residence">Residence</option>
            <option value="Commercial">Commercial</option>
        </select>
        <br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location">
        <br>

        <label for="price">Price Limit:</label>
        <select id="price" name="price">
            <option value="0-5000000">0 - 5,000,000</option>
            <option value="5000000-10000000">5,000,000 - 10,000,000</option>
        </select>
        <br>

        <input type="submit" value="Search">
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("property-search-form");
            const propertyTypeSelect = document.getElementById("property-type");

            form.addEventListener("submit", function(e) {
                const selectedType = propertyTypeSelect.value;

                if (selectedType === "Residence") {
                    form.action = "./view/properties.php";
                } else if (selectedType === "Commercial") {
                    form.action = "commercialProperty.php";
                }
            });
        });
    </script>
</body>
</html>
