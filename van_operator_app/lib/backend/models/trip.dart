class TripAssigned {
  final int vanId;
  final int vanStudentId;
  final String sourceRoute;
  final String destinationRoute;
  final String startTime;
  final String endTime;
  final String dateOfTrip;
  final String tripStatus;

  TripAssigned({
    required this.vanId,
    required this.vanStudentId,
    required this.sourceRoute,
    required this.destinationRoute,
    required this.startTime,
    required this.endTime,
    required this.dateOfTrip,
    required this.tripStatus,
  });

  factory TripAssigned.fromJson(Map<String, dynamic> json) {
    return TripAssigned(
      vanId: json['vanId'],
      vanStudentId: json['vanStudentId'],
      sourceRoute: json['sourceRoute'],
      destinationRoute: json['destinationRoute'],
      startTime: json['startTime'],
      endTime: json['endTime'],
      dateOfTrip: json['dateOfTrip'],
      tripStatus: json['tripStatus'],
    );
  }
}
