class StoppedTrip {
  final int vanId;
  final int vanStudentId;
  final int driverId;
  final String sourceRoute;
  final String destinationRoute;
  final String startTime;
  final String endTime;
  final String dateOfTrip;
  final String tripStatus;
  final int numberOfStops;

  StoppedTrip({
    required this.vanId,
    required this.vanStudentId,
    required this.driverId,
    required this.sourceRoute,
    required this.destinationRoute,
    required this.startTime,
    required this.endTime,
    required this.dateOfTrip,
    required this.tripStatus,
    required this.numberOfStops,
  });

  // getting the data from the backend
  factory StoppedTrip.fromJson(Map<String, dynamic> json) {
    return StoppedTrip(
      vanId: json['vanId'],
      vanStudentId: json['vanStudentId'],
      driverId: json['driverId'],
      sourceRoute: json['sourceRoute'],
      destinationRoute: json['destinationRoute'],
      startTime: json['startTime'],
      endTime: json['endTime'],
      dateOfTrip: json['dateOfTrip'],
      tripStatus: json['tripStatus'],
      numberOfStops: json['numberOfStops'],
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
      'numberOfStops': numberOfStops,
    };
  }
}
