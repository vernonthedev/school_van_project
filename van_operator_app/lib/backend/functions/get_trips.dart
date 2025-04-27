import 'dart:convert';
import '../models/trip.dart';
import '../services/api_service.dart';

/// we are gonna use our api service to load the trips from the api
class GetTrips {
  static Future<List<TripAssigned>> loadTrips() async {
    final response = await ApiService.get('trips');

    if (response.statusCode == 200) {
      // the data we get from the api has data : [] map so that is why we have to decode it so that we get access to the inner data list
      final Map<String, dynamic> decodedResponse = json.decode(response.body);
      // now since we are inside the list, we can now get the data as type of list.
      final List<dynamic> jsonResponse = decodedResponse['data'];

      // convert our response from json to a dart list we can use in our app.
      return jsonResponse
          .map((tripJson) => TripAssigned.fromJson(tripJson))
          .toList();
    } else {
      throw Exception('Failed to load trips: ${response.statusCode}');
    }
  }
}
