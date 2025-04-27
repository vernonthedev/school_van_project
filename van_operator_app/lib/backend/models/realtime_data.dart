class RealtimeVanData {
  final int driverId;
  final int tripId;
  final String currentLatitude;
  final String currentLongitude;
  final String dateOfTrip;
  final String currentTime;
  final String? tripStatus;

  RealtimeVanData({
    required this.driverId,
    required this.tripId,
    required this.currentLatitude,
    required this.currentLongitude,
    required this.currentTime,
    required this.dateOfTrip,
    this.tripStatus,
  });

  // pushing the data to the backend
  Map<String, dynamic> toJson() {
    return {
      'driverId': driverId,
      'tripId': tripId,
      'currentLatitude': currentLatitude,
      'currentLongitude': currentLongitude,
      'currentTime': currentTime,
      'dateOfTrip': dateOfTrip,
      'tripStatus': tripStatus,
    };
  }
}
