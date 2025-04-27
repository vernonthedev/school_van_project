import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import '../../../backend/models/trip.dart';
import '../cards/trip_card.dart';

class TripList extends StatelessWidget {
  final DateTimeRange? selectedDateRange;
  final String filterStatus;
  final List trips;

  const TripList({
    super.key,
    required this.selectedDateRange,
    required this.filterStatus,
    required this.trips,
  });

  List get _filteredTrips {
    return trips.where((trip) {
      final tripDate = DateTime.parse(trip.dateOfTrip);
      final matchesDate =
          selectedDateRange == null ||
          (tripDate.isAfter(selectedDateRange!.start) &&
              tripDate.isBefore(selectedDateRange!.end));
      final matchesStatus =
          filterStatus == 'All' || trip.tripStatus == filterStatus;
      return matchesDate && matchesStatus;
    }).toList();
  }

  @override
  Widget build(BuildContext context) {
    return _filteredTrips.isEmpty
        ? Center(
          child: Text(
            'No trips found',
            style: GoogleFonts.poppins(
              fontSize: 16,
              fontWeight: FontWeight.w500,
            ),
          ),
        )
        : ListView.builder(
          padding: const EdgeInsets.all(16),
          itemCount: _filteredTrips.length,
          itemBuilder: (context, index) {
            return TripCard(trip: _filteredTrips[index]);
          },
        );
  }
}
