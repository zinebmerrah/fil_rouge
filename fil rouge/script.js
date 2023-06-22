$(document).ready(function() {
    var apiEndpoint = "http://api.aladhan.com/v1/calendarByCity"; // Endpoint de l'API d'Aladhan
  
    var city = "Tahla";
    var country = "Morocco";
    var method = 2;
  
    // Récupérer la date actuelle
    var currentDate = new Date();
    console.log(currentDate);
  
    // Itérer sur les jours et récupérer les horaires des prières
    for (var i = 0; i < 7; i++) {
      var params = {
        city: city,
        country: country,
        method: method,
        date: currentDate.toISOString().slice(0, 10)
      };
  
      // Appel à l'API d'Aladhan pour chaque jour
      $.get(apiEndpoint, params, function(data) {
        // Récupération des horaires des prières et de la date al-hijri pour le jour en cours
        var prayerTimes = data.data[0].timings;
        console.log(data.data[0]);
  
        // Supprimer le décalage de fuseau horaire
        var formattedPrayerTimes = removeTimeZoneOffset(prayerTimes);
  
        // Attribuer les horaires de prières aux balises h6 correspondantes
        $("#date").text(currentDate.toISOString().slice(0, 10));
        $("#ishaTime").text(formattedPrayerTimes.Isha);
        $("#maghribTime").text(formattedPrayerTimes.Maghrib);
        $("#asrTime").text(formattedPrayerTimes.Asr);
        $("#dhuhrTime").text(formattedPrayerTimes.Dhuhr);
        $("#sunriseTime").text(formattedPrayerTimes.Sunrise);
        $("#fajrTime").text(formattedPrayerTimes.Fajr);
      });
  
      // Ajouter 1 jour à la date actuelle pour passer au jour suivant
    //   currentDate.setDate(currentDate.getDate() + 1);
    }
  
    // Fonction pour supprimer le décalage de fuseau horaire
    function removeTimeZoneOffset(time) {
      var formattedTime = {};
      for (var prayer in time) {
        formattedTime[prayer] = time[prayer].replace(/\s*\([^)]*\)/, '');
      }
      return formattedTime;
    }
  });
  