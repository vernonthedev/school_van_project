class MakeStop {
  final int vanId;
  final int studentToBePicked;
  final int driverId;
  final int parentToBeVerified;
  final String onStopCoordinates;
  final String onStopTime;
  final String dateOfTrip;
  final String tripStatus;

  MakeStop({
    required this.vanId,
    required this.studentToBePicked,
    required this.driverId,
    required this.parentToBeVerified,
    required this.onStopCoordinates,
    required this.onStopTime,
    required this.dateOfTrip,
    required this.tripStatus,
  });

  // getting the data from the backend
  factory MakeStop.fromJson(Map<String, dynamic> json) {
    return MakeStop(
      vanId: json['vanId'],
      studentToBePicked: json['studentToBePicked'],
      driverId: json['driverId'],
      parentToBeVerified: json['parentToBeVerified'],
      onStopCoordinates: json['onStopCoordinates'],
      onStopTime: json['onStopTime'],
      dateOfTrip: json['dateOfTrip'],
      tripStatus: json['tripStatus'],
    );
  }

  // pushing the data to the backend
  Map<String, dynamic> toJson() {
    return {
      'vanId': vanId,
      'studentToBePicked': studentToBePicked,
      'driverId': driverId,
      'parentToBeVerified': parentToBeVerified,
      'onStopCoordinates': onStopCoordinates,
      'onStopTime': onStopTime,
      'dateOfTrip': dateOfTrip,
      'tripStatus': tripStatus,
    };
  }
}
