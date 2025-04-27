class StartedTrip {
  final int vanId;
  final int vanStudentId;
  final int driverId;
  final String sourceRoute;
  final String destinationRoute;
  final String startTime;
  final String endTime;
  final String dateOfTrip;
  final String tripStatus;
  final bool onStopStatus;

  StartedTrip({
    required this.vanId,
    required this.vanStudentId,
    required this.driverId,
    required this.sourceRoute,
    required this.destinationRoute,
    required this.startTime,
    required this.endTime,
    required this.dateOfTrip,
    required this.tripStatus,
    required this.onStopStatus,
  });

  // getting the data from the backend
  factory StartedTrip.fromJson(Map<String, dynamic> json) {
    return StartedTrip(
      vanId: json['vanId'],
      vanStudentId: json['vanStudentId'],
      driverId: json['driverId'],
      sourceRoute: json['sourceRoute'],
      destinationRoute: json['destinationRoute'],
      startTime: json['startTime'],
      endTime: json['endTime'],
      dateOfTrip: json['dateOfTrip'],
      tripStatus: json['tripStatus'],
      onStopStatus: json['onStopStatus'],
    );
  }

  // pushing the data to the backend
  Map<String, dynamic> toJson() {
    return {
      'vanId': vanId,
      'vanStudentId': vanStudentId,
      'driverId': driverId,
      'sourceRoute': sourceRoute,
      'destinationRoute': destinationRoute,
      'startTime': startTime,
      'endTime': endTime,
      'dateOfTrip': dateOfTrip,
      'tripStatus': tripStatus,
      'onStopStatus': onStopStatus,
    };
  }
}
